@extends('layout.app')
@section('content')
    <div
        class="grid w-full absolute left-0 top-20 gap-4 p-4 pb-14 grid-rows-8 grid-cols-1 sm:grid-rows-2 sm:grid-cols-4 lg:grid-cols-5">
        <!-- LEFT CONAINER -->
        <div
            class="row-span-1 col-span-1 h-40 sm:h-80 sm:row-span-1 sm:col-span-1 sm:row-start-1 sm:col-start-1 lg:row-span-1 lg:col-span-1 bg-outline rounded-md">
            <article class="w-full h-full flex flex-col justify-around items-center font-bold">
                <a href="{{ route('userPage', ['id' => Auth::user()->id]) }}">Account</a>
                <a href="{{ route('order.index') }}" class="text-primary">Order History</a>
                <a href="{{ route('logout') }}">
                    <button class="bg-primary text-white h-10 w-40 px-10 rounded-md cursor-pointer">Log Out</button>
                </a>
            </article>
        </div>

        <!-- RIGHT CONTAINER -->
        <div
            class="row-span-7 col-span-1 row-start-2 sm:col-span-3 sm:row-span-2 sm:row-start-1 sm:col-start-2 lg:row-span-2 lg:row-start-1 lg:col-start-2 lg:col-span-4 rounded-md border-1 border-outline flex flex-col h-full w-full">
            <div class="flex gap-4 mt-4 mx-4">
                <span class="text-xl font-bold text-primary">Order #{{ $order->id }}</span>
                @if ($order->status == 'delivered')
                    <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600"> Delivered
                    </span>
                @elseif ($order->order_status == 'preparing')
                    <span class="bg-orange-200 px-4 py-1 border border-orange-600 rounded-lg text-orange-500"> Preparing
                    </span>
                @else
                    <span class="bg-red-200 px-4 py-1 border border-red-600 rounded-lg text-red-600"> Cancelled </span>
                @endif
            </div>

            <div
                class="border border-outline rounded-md sm:m-4 grid grid-cols-1 grid-rows-4 sm:grid-cols-1 sm:grid-rows-4 lg:grid-cols-2 lg:grid-rows-3">
                <!-- LEFT INNER CONTAINER -->
                <div
                    class="m-4 border border-outline rounded-md row-span-2 row-start-1 sm:row-span-2 sm:row-start-1 lg:row-span-4 lg:col-span-1 lg:row-start-1 lg:col-start-1 p-4 flex flex-col items-center gap-4">
                    <!-- SCROLLABLE CONTAINER -->
                    <div class="flex flex-col h-80 w-full gap-4 overflow-scroll">

                        @foreach ($order->products as $product)
                            <!-- ONE PRODUCT -->
                            <div class="w-full flex items-center gap-4">
                                <img src="{{ asset('storage/uploads/images/' . $product->product->product_category . '/' . $product->product->product_image) }}"
                                    alt="guitarPlaceholder" class="w-40 h-40 object-cover" />
                                <div class="flex flex-col gap-2">
                                    <p class="text-lg font-bold">{{ $product->product->product_visible_name }}</p>
                                    <article class="text-md font-light">
                                        <span>Qty: </span>
                                        <span>{{ $product->quantity }}x</span>
                                        <span class="font-bold text-primary">{{ $product->product->product_price }} €</span>
                                    </article>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- TOTAL PRICE -->
                    <div class="w-full h-40 p-4">
                        <table class="table-fixed w-full h-full text-lg">
                            <tbody>
                                <tr>
                                    <td class="w-2/3 md:w-3/4">Sub-total:</td>
                                    <td class="w-1/3 md:w-1/4 text-primary">{{ $subTotal }} €</td>
                                </tr>
                                <tr>
                                    <td>Shipping:</td>
                                    <td class="text-primary">{{ $deliveryPrice }} €</td>
                                </tr>
                                <tr class="border-t-4 border-primary text-xl font-bold">
                                    <td>Total:</td>
                                    <td class="text-primary">{{ $order->total_price }} €</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TOP RIGHT INNER CONTAINER -->
                <div
                    class="m-4 border border-outline rounded-md row-span-1 row-start-3 sm:row-span-1 sm:row-start-3 lg:row-span-2 lg:col-span-1 lg:row-start-1 lg:col-start-2">
                    <div class="bg-primary w-full h-10 rounded-t-md flex justify-center items-center text-white font-bold">
                        Shipping Information
                    </div>
                    <div class="flex flex-col items-center justify-center px-4">
                        <table class="table-auto w-full h-full">
                            <tbody>
                                <tr>
                                    <td class="font-bold pt-4">Address:</td>
                                    <td>
                                        <p>{{ $order->address }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold pt-4">Country:</td>
                                    <td>
                                        <p>{{ $order->country }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold pt-4">Region:</td>
                                    <td>
                                        <p>{{ $order->region }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold pt-4">City:</td>
                                    <td>
                                        <p>{{ $order->city }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold pt-4">Zip Code:</td>
                                    <td>
                                        <p>{{ $order->zip_code }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold pt-4">Shipping Method:</td>
                                    <td>
                                        @if ($order->shipping_method == 'standard-delivery')
                                            <p>Standard Delivery</p>
                                        @elseif ($order->shipping_method == 'express-delivery')
                                            <p>Express Delivery</p>
                                        @else
                                            <p>Pickup</p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- BOTTOM RIGHT INNER CONTAINER -->
                <div
                    class="m-4 border border-outline rounded-md row-span-1 row-start-4 sm:row-span-1 sm:row-start-4 lg:row-span-1 lg:col-span-1 lg:row-start-3 lg:col-start-2">
                    <div class="bg-primary w-full h-10 rounded-t-md flex justify-center items-center text-white font-bold">
                        Order Details
                    </div>
                    <div class="flex flex-col items-center justify-center px-4">
                        <table class="table-auto w-full h-full border-spacing-0">
                            <tbody>
                                <tr>
                                    <td class="font-bold pt-4">Ordered On:</td>
                                    <td>
                                        <p>{{ $createdAt }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold pt-4">Expected Delivery:</td>
                                    <td>
                                        <p> {{ $expectedDelivery }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-bold pt-4">Payment Method:</td>
                                    <td>
                                        <p>Card</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-2 w-full p-4 sm:pt-0">
                @if ($order->order_status === 'preparing')
                    <form action="{{ route('order.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="bg-primary text-white h-10 px-10 rounded-md col-span-1 lg:col-start-2 cursor-pointer"
                            name="order_status" value="cancelled" type="submit">
                            Cancel Order
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
