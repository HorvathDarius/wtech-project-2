<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductGuitarsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('productsGuitars',
        [
            'products' => Product::orderBy('created_at', 'DESC')->paginate(12)
        ]);
    }
}
