<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\PaymentInformation;
use App\Models\ShoppingCart;
use App\Models\User;
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

        $shoppingCart = ShoppingCart::query()
            ->with(['products'])
            ->where('user_id', auth()->id())
            ->first();

        if (!$shoppingCart->products() || $shoppingCart->products()->count() == 0) {
            return view('cartFallback');
        }

        $paymentInformation = $user->paymentInformation;

        if ($paymentInformation == null) {
            $paymentInformation = new PaymentInformation();
        }

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

        // Get user
        $user = auth()->user();

        // Create order
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

        // If user has no payment information, create it based on order info
        $paymentId = 0;
        if ($user->paymentInformation == null) {
            $paymentCreated = PaymentInformation::create(
                [
                    'user_id' => $user->id,
                    'card_number' => $request->card_number,
                    'name_on_card' => $request->name_on_card,
                ]

            );
            $paymentId = $paymentCreated->id;
        }

        // If user has no address, update with data from order them
        if ($user->address == null) {
            $user = User::find($user->id);
            $user->address = $request->address;
            $user->country = $request->country;
            $user->region = $request->region;
            $user->city = $request->city;
            $user->zip_code = $request->zip_code;
            $user->phone_number = $request->phone_number;
            if ($paymentId != 0) {
                $user->payment_information = $paymentId;
            }
            $user->save();
        }

        // Get order items
        $shoppingCart = ShoppingCart::query()
            ->with(['products'])
            ->where('user_id', auth()->id())
            ->first();

        // Create Order items    
        foreach ($shoppingCart->products as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product->product_id,
                'quantity' => $product->quantity,
            ]);
        }

        // Delete all products in shopping cart
        foreach ($shoppingCart->products as $product) {
            $product->delete();
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
