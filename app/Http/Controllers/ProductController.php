<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->paginate(3);

        return view("adminPage", [
            'products' => $products,
        ]);
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'product_visible_name' => $request->product_visible_name,
            'product_link_name' => $request->product_visible_name . '-' . $request->product_category,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'product_category' => $request->product_category,
            'product_color' => $request->product_color,
            'quantity' => $request->quantity,
            'product_image' => $request->product_image[0],
        ]);

        return redirect()->route('editProduct', ['id' => $product->id]);
    }

    public function showProductCategory($category)
    {
        $products = Product::where('product_category', $category)
            ->orderBy('created_at')
            ->paginate(10);

        $viewName = match ($category) {
            'guitar' => 'productsGuitars',
            'bass' => 'productsBasses',
            'amp' => 'productsAmps'
        };

        return view($viewName, ['products' => $products]);
    }

    public function showLandingPageProducts()
    {
        $popularProducts = Product::inRandomOrder()->take(6)->get();
        $productsOnSale = Product::inRandomOrder()->take(6)->get();

        return view('landingPage',
        ['popularProducts' => $popularProducts,
         'productsOnSale' => $productsOnSale]);
    }

    public function showProduct($product_link_name)
    {
        $products = Product::where('product_link_name', $product_link_name)->first();
        return view('productPage', compact('products'));
    }

    public function showProductAdmin($id)
    {
        $product = Product::where('id', $id)->first();
        return view('editProduct', ['product' => $product]);
    }

    public function searchProduct($category, Request $searchRequest)
    {
        $search = $searchRequest->input('search');

        $results = Product::where('product_category', $category)
            ->where('product_visible_name', 'ilike', "%$search%")
            ->orderBy('created_at')
            ->paginate(10);

        $viewName = match ($category) {
            'guitar' => 'productsGuitars',
            'bass' => 'productsBasses',
            'amp' => 'productsAmps'
        };

        return view($viewName, ['products' => $results]);
    }

    public function filterProduct(Request $filterRequest, $category)
    {
        $colorFilter = $filterRequest->input('colors', []);
        $stockFilter = $filterRequest->input('stock');
        $priceCategory = $filterRequest->input('price_category', []);
        $sortSelect = $filterRequest->input('sortSelect');
        $query = Product::where('product_category', $category);

        if (empty(!$colorFilter))
        {
            $query->whereIn('product_color', $colorFilter);
        }

        if (empty(!$priceCategory))
        {
            $query->where(function ($q) use ($priceCategory) {
                if (in_array('price_category_1', $priceCategory)) {
                    $q->orWhereBetween('product_price', [0, 250]);
                }
                if (in_array('price_category_2', $priceCategory)) {
                    $q->orWhereBetween('product_price', [250, 500]);
                }
                if (in_array('price_category_3', $priceCategory)) {
                    $q->orWhere('product_price', '>', 500);
                }
            });
        }

        if ($stockFilter === 'in_stock') {
            $query->where('quantity', '>', 0);
        } elseif ($stockFilter === 'sold_out') {
            $query->where('quantity', '=', 0);
        }

        if ($sortSelect === 'Lowest-Price'){
            $query->orderBy('product_price', 'ASC');
        }
        else if ($sortSelect === 'Highest-Price'){
            $query->orderBy('product_price', 'DESC');
        }
        else if ($sortSelect === 'Product-Name-A-Z'){
            $query->orderBy('product_visible_name', 'ASC');
        }
        else if ($sortSelect === 'Product-Name-Z-A'){
            $query->orderBy('product_visible_name', 'DESC');
        }
        else{
            $query->orderBy('created_at');
        }

        $results = $query->paginate(10);

        $viewName = match ($category) {
            'guitar' => 'productsGuitars',
            'bass' => 'productsBasses',
            'amp' => 'productsAmps'
        };

        return view($viewName,
        ['products' => $results,
         'colors' => $colorFilter,
         'stocks' => $stockFilter,
         'prices' => $priceCategory,
         'sort' => $sortSelect,
        ]);
    }
}
