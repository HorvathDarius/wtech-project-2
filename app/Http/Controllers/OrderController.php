<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::query()
            ->where('user_id', auth()->id())
            ->orderBy("created_at", "desc")
            ->paginate(10);

        return view('orderHistoryPage', [
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        // dd($user->name);

        $shoppingCart = ShoppingCart::query()
            ->with(['products'])
            ->where('user_id', auth()->id())
            ->first();

        if (!$shoppingCart->products() || $shoppingCart->products()->count() == 0) {
            return view('cartFallback');
        }

        $paymentInformation = $user->paymentInformation;

        $totalPrice = 0;
        foreach ($shoppingCart->products as $products) {
            $totalPrice += $products->product->product_price * $products->quantity;
        }

        return view('checkout', [
            'user' => $user,
            'products' => $shoppingCart->products,
            'totalPrice' => $totalPrice,
            'paymentInfo' => $paymentInformation
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = auth()->user();

        $order = Order::create([
            'user_id' => $user->id,
            'order_status' => 'preparing',
            'total_price' => $request->totalPrice,
            'address' => $request->address,
            'country' => $request->country,
            'region' => $request->region,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'shipping_method' => $request->delivery,
        ]);

        $shoppingCart = ShoppingCart::query()
            ->with(['products'])
            ->where('user_id', auth()->id())
            ->first();

        foreach ($shoppingCart->products as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product->product_id,
                'quantity' => $product->quantity,
            ]);
        }

        return view('orderSuccess', [
            'order' => $order,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch order with products
        $order = Order::query()
            ->with(['products'])
            ->where('id', $id)
            ->first();

        // Calculate price, delivery price, subtotal
        $totalPrice = $order->total_price;
        $deliveryPrice = $order->shipping_method == 'express-delivery' ? 30 : ($order->shipping_method == 'standard-delivery' ? 15 : 0);
        $subTotal = $totalPrice - $deliveryPrice;


        // Calculate expected delivery date
        $createdAt = date("j.m.Y", $order->created_at->timestamp);
        $deliveryDays = $order->shipping_method == 'express-delivery' ? 3 : ($order->shipping_method == 'standard-delivery' ? 7 : 0);

        if ($deliveryDays > 0) {
            $expectedDelivery = date("j.m.Y", strtotime($createdAt . "+ " . $deliveryDays . " days"));
        } else {
            $expectedDelivery = "Pick up in store";
        }

        if ($order->order_status == 'cancelled') {
            $expectedDelivery = "Order cancelled";
        }

        return view('orderPage', [
            'order' => $order,
            'subTotal' => $subTotal,
            'deliveryPrice' => $deliveryPrice,
            'createdAt' => $createdAt,
            'expectedDelivery' => $expectedDelivery,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'order_status' => 'required|string|',
        ]);

        $order = Order::find($id);
        $order->order_status = $request->order_status;
        $order->save();
        return redirect()->route('order.show', $order->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
