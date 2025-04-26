<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartProduct;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shoppingCart = ShoppingCart::query()
            ->with(['products'])
            ->where('user_id', auth()->id())
            ->first();

        if (!$shoppingCart->products() || $shoppingCart->products()->count() == 0) {
            return view('cartFallback');
        }

        $totalPrice = 0;
        foreach ($shoppingCart->products as $products) {
            $totalPrice += $products->product->product_price * $products->quantity;
        }

        $recommendedProducts = Product::query()
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('cart', [
            'products' => $shoppingCart->products,
            'totalPrice' => $totalPrice,
            'recommendedProducts' => $recommendedProducts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $shoppingCartProduct = ShoppingCartProduct::create([
            // HARDCODED FOR NOW
            'shopping_cart_id' => 3,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShoppingCart $shoppingCart)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShoppingCart $shoppingCart)
    {
        //
    }

    public function deleteShoppingCartProduct(Request $request)
    {
        $request->validate([
            'cart_product_id' => 'required|integer'
        ]);

        $shoppingCartProduct = ShoppingCartProduct::find($request->id);

        if ($shoppingCartProduct) {
            $shoppingCartProduct->delete();
            return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully!');
        }

        return redirect()->route('cart.index')->with('error', 'Product not found in cart!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShoppingCart $shoppingCart)
    {
        //
    }
}
