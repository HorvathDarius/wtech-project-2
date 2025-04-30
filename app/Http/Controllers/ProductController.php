<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showProductCategory($category)
    {
        $products = Product::where('product_category', $category)
            ->orderBy('created_at')
            ->paginate(10);

        $viewName = match($category) {
            'guitar' => 'productsGuitars',
            'bass' => 'productsBasses',
            'amp' => 'productsAmps'
        };

        return view($viewName, ['products' => $products]);
    }

    public function showProduct($product_link_name)
    {
        $products = Product::where('product_link_name', $product_link_name)->first();
        return view('productPage', compact('products'));
    }

    public function searchProduct($category, Request $searchRequest)
    {
        $search = $searchRequest->input('search');
        $results = Product::where('product_category', $category)
            ->where('product_visible_name', 'ilike', "%$search%")
            ->orderBy('created_at')
            ->paginate(10);

        return view('productsGuitars', ['products' => $results]);
    }

    public function filterProduct($category, Request $searchRequest)
    {
        $colorFilter = $searchRequest->input('color');
        $results = Product::where('product_category', $category)
            ->where('product_color', 'like', colorFilter)
            
            ->orderBy('created_at')
            ->paginate(10);

        return view('productsGuitars', ['products' => $results]);
    }
}
