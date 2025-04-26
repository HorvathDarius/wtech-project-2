<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductGuitarsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view(
            'productsGuitars',
            [
                'products' => Product::orderBy('created_at', 'DESC')->paginate(12)
            ]
        );
    }

    public function showProduct($product_link_name)
    {
        $products = Product::where('product_link_name', $product_link_name)->first();
        return view('productPage', compact('products'));
    }
}
