<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Return products for admin.
     */
    public function index()
    {
        $products = Product::query()
            ->paginate(10);

        return view("adminPage", [
            'products' => $products,
        ]);
    }

    /**
     * Product creation.
     */
    public function store(Request $request)
    {
        $paths = [];

        if ($request->hasFile('product_image')) {
            foreach ($request->file('product_image') as $file) {
                $categoryFolder = in_array($request->product_category, ['guitar', 'bass', 'amp'])
                    ? $request->product_category
                    : 'other';

                $storedPath = $file->store("/uploads/images/" . $categoryFolder, "public");
                $filename = basename($storedPath);
                $paths[] = $filename;
            }
        }

        $product = Product::create([
            'product_visible_name' => $request->product_visible_name,
            'product_link_name' => $request->product_visible_name . '-' . $request->product_category,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'product_category' => $request->product_category,
            'product_color' => $request->product_color,
            'quantity' => $request->quantity,
            'product_image' => $paths[0] ?? null,
            'product_image_second' => $paths[1] ?? null,
        ]);

        return redirect()->route('products.editProduct', ['id' => $product->id]);
    }

    /**
     * Product update
     */
    public function edit($product_id, Request $request)
    {
        $product = Product::findOrFail($product_id);

        $files = $request->file('product_image');
        $files = is_array($files) ? $files : ($files ? [$files] : []);

        if (count($files) > 0) {
            // Delete the old images
            $categoryFolder = $product->product_category;
            $path_main = "uploads/images/" . $categoryFolder . "/" . $product->product_image;
            $path_second = "uploads/images/" . $categoryFolder . "/" . $product->product_image_second;
            Storage::disk('public')->delete($path_main);
            Storage::disk('public')->delete($path_second);

            // Upload the new images
            $paths = [];
            foreach ($request->file('product_image') as $file) {
                $categoryFolder = in_array($request->product_category, ['guitar', 'bass', 'amp'])
                    ? $request->product_category
                    : 'other';

                $storedPath = $file->store("uploads/images/" . $categoryFolder, 'public');
                $filename = basename($storedPath);
                $paths[] = $filename;
            }

            // Set new images to db
            $product->product_image = $paths[0] ?? $product->product_image;
            $product->product_image_second = $paths[1] ?? $product->product_image_second;
        }

        $oldCategory = $product->product_category;
        $newCategory = $request->product_category;
        if ($oldCategory !== $newCategory) {
            // Move main image
            if ($product->product_image) {
                $oldPath = "uploads/images/" . $oldCategory . "/" . $product->product_image;
                $newPath = "uploads/images/" . $newCategory . "/ " . $product->product_image;

                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->move($oldPath, $newPath);
                }
            }

            // Move secondary image
            if ($product->product_image_second) {
                $oldPath = "uploads/images/" . $oldCategory . "/ " . $product->product_image_second;
                $newPath = "uploads/images/" . $newCategory . "/" . $product->product_image_second;

                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->move($oldPath, $newPath);
                }
            }
        }

        $fields = [
            'product_visible_name',
            'product_price',
            'product_category',
            'product_color',
            'quantity',
            'product_description',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                $product->$field = $request->input($field);
            }
        }

        $product->save();

        return redirect()->route('products.editProduct', ['id' => $product->id]);
    }

    /**
     * Delete product
     */
    public function delete(string $product_id)
    {
        $product = Product::findOrFail($product_id);

        // Delete images
        $categoryFolder = $product->product_category;

        if ($product->product_image) {
            Storage::disk('public')->delete("uploads/images/{$categoryFolder}/{$product->product_image}");
        }

        if ($product->product_image_second) {
            Storage::disk('public')->delete("uploads/images/{$categoryFolder}/{$product->product_image_second}");
        }

        // Delete product from database
        $product->delete();
        return redirect()->route('adminPage')->with('success', 'Product deleted successfully.');
    }

    /**
     * Show products category page
     */
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

    /**
     * Show landing page products
     */
    public function showLandingPageProducts()
    {
        $popularProducts = Product::inRandomOrder()->take(6)->get();
        $productsOnSale = Product::inRandomOrder()->take(6)->get();

        return view(
            'landingPage',
            [
                'popularProducts' => $popularProducts,
                'productsOnSale' => $productsOnSale
            ]
        );
    }

    /**
     * Show product page
     */
    public function showProduct($product_link_name)
    {
        $products = Product::where('product_link_name', $product_link_name)->first();
        return view('productPage', compact('products'));
    }

    /**
     * Show product edit page
     */
    public function showProductAdmin($id)
    {
        $product = Product::where('id', $id)->first();
        return view('editProduct', ['product' => $product]);
    }

    /**
     * Search products on category page
     */
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

    /**
     * Search all products on admin page
     */
    public function searchAdminProducts(Request $searchRequest)
    {
        $search = $searchRequest->input('search');

        $results = Product::query()
            ->where('product_visible_name', 'ilike', "%$search%")
            ->orderBy('created_at')
            ->paginate(10);

        return view('adminPage', ['products' => $results]);
    }

    /**
     * Filter products on category page
     */
    public function filterProduct(Request $filterRequest, $category)
    {
        $colorFilter = $filterRequest->input('colors', []);
        $stockFilter = $filterRequest->input('stock');
        $priceCategory = $filterRequest->input('price_category', []);
        $sortSelect = $filterRequest->input('sortSelect');
        $query = Product::where('product_category', $category);

        if (empty(!$colorFilter)) {
            $query->whereIn('product_color', $colorFilter);
        }

        if (empty(!$priceCategory)) {
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

        if ($sortSelect === 'Lowest-Price') {
            $query->orderBy('product_price', 'ASC');
        } else if ($sortSelect === 'Highest-Price') {
            $query->orderBy('product_price', 'DESC');
        } else if ($sortSelect === 'Product-Name-A-Z') {
            $query->orderBy('product_visible_name', 'ASC');
        } else if ($sortSelect === 'Product-Name-Z-A') {
            $query->orderBy('product_visible_name', 'DESC');
        } else {
            $query->orderBy('created_at');
        }

        $results = $query->paginate(10);

        $viewName = match ($category) {
            'guitar' => 'productsGuitars',
            'bass' => 'productsBasses',
            'amp' => 'productsAmps'
        };

        return view(
            $viewName,
            [
                'products' => $results,
                'colors' => $colorFilter,
                'stocks' => $stockFilter,
                'prices' => $priceCategory,
                'sort' => $sortSelect,
            ]
        );
    }
}
