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
    public function index(Request $request)
    {
        if (auth()->user() !== null) {
            $shoppingCart = ShoppingCart::query()
                ->with(['products'])
                ->where('user_id', auth()->id())
                ->first();
        } else {
            return view('cart', [
                'products' => [],
                'totalPrice' => 0,
                'recommendedProducts' => []
            ]);
        }
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $user = auth()->user();

        if ($user === null) {
            // dd('User not authenticated');
            return redirect()->route('cart.index');
        }

        ShoppingCartProduct::create([
            'shopping_cart_id' => $user->shoppingCart->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shoppingCart = ShoppingCart::query()
            ->with(['products'])
            ->where('id', $id)
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

    public function loadCartProducts(Request $request)
    {
        // dd($request->all());
        $products = $request->payload['products'];
        $cartId = $request->payload['cartId'];
        // dd($cartId);

        if ($cartId === 0) {
            $shoppingCart = ShoppingCart::create([
                'user_id' => 0
            ]);
            $cartId = $shoppingCart->id;
        }

        foreach ($products as $product) {
            ShoppingCartProduct::create(
                [
                    'shopping_cart_id' => $cartId,
                    'product_id' => $product['product_id'],
                    'quantity' => $product['quantity']
                ]
            );
        }

        return response()->json([
            'status' => 'success',
            'id' => $cartId,
        ]);
    }

    /**
     *  Update quantity of product in shopping cart.
     */
    public function updateShoppingCartProduct(Request $request)
    {
        // Get the shopping cart product by ID
        $shoppingCartProduct = ShoppingCartProduct::query()
            ->where('id', $request->product_id)
            ->first();

        // If found, update the quantity
        if ($shoppingCartProduct) {
            $shoppingCartProduct->update(['quantity' => $request->quantity]);
            return redirect()->route('cart.index');
        }
    }

    /**
     * Delete product from shopping cart.
     */
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
}
