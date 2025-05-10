@extends('layout.app')

@section('content')
    <p class="w-full text-2xl px-8 py-2 mt-8 font-bold text-black">
        Your Shopping Basket
    </p>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 px-4">

        <!-- Table of products -->
        <div class="lg:col-span-1 col-span-1 w-full">
            <div class="overflow-scroll h-100">
                <table class="w-full table-auto border-collapse">
                    <tbody>

                        <!-- Product in the basket -->
                        @foreach ($products as $product)
                            <tr class="h-28">
                                <td class="p-1">
                                    <div class="grid grid-cols-[1fr_4fr_1fr] border rounded shadow overflow-hidden w-full h-28">
                                        <div class="col-start-1 row-span-3 col-span-1 relative w-28 h-28">
                                            <img src="{{ asset('storage/uploads/images/' . $product->product->product_category . '/' . $product->product->product_image) }}"
                                                alt="thumb1" class="object-cover" />
                                        </div>
                                        <div class="p-4 col-start-2 col-span-1">
                                            <div class="flex gap-2">
                                                <h3 class="font-bold text-l">{{ $product->product->product_visible_name }}
                                                </h3>
                                                <span> - </span>
                                                <p class="text-primary font-bold">{{ $product->product->product_category }}
                                                </p>
                                            </div>
                                            @if ($product->product->product_color == 'red')
                                                <p class="text-sm">Crimson Red</p>
                                            @elseif ($product->product->product_color == 'blue')
                                                <p class="text-sm">Blueish Blue</p>
                                            @else
                                                <p class="text-sm">Pitch black</p>
                                            @endif
                                            <p class="text-sm font-bold text-green-700">Available</p>
                                            <form action="{{ route('cart.removeItem', $product->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}" name="cart_product_id" />
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="cursor-pointer" type="submit">🗑️</button>
                                            </form>
                                        </div>

                                        <div class="gap-1 text-center justify-around content-around bg-center">

                                            <input type="number" value="{{ $product->quantity }}" min="1" max="100" step="1"
                                                class="border rounded p-1 mx-auto" name="quantity" id={{ $product->id }} />

                                            <p class="font-bold text-3xl text-primary">
                                                {{ $product->product->product_price }} €
                                            </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right side of the screen -->
        <div class="lg:col-span-1 col-span-1 w-full">
            <div class="grid grid-rows-2 gap-4 place-items-center">

                <!-- Order total -->
                <div class="bg-outline rounded-md p-4 w-full max-w-md lg:w-full lg:max-w-md">
                    <article class="grid gap-2 h-40 place-items-center font-bold text-center">
                        <span class="text-primary text-3xl">Total: {{ $totalPrice }}€</span>
                        @auth
                            <a href="{{ route('order.create') }}">
                                <button id='test-btn' class="bg-primary text-white h-10 w-44 rounded-md cursor-pointer">To
                                    Checkout</button>
                            </a>
                        @endauth
                        @guest
                            <button id='checkout-btn' class="bg-primary text-white h-10 w-44 rounded-md cursor-pointer">To
                                Checkout</button>
                        @endguest
                    </article>
                </div>

                <!-- Shipping info -->
                <div class="border-2 border-primary rounded-md p-4 font-italic w-full max-w-md lg:w-full lg:max-w-md">
                    <article class="grid place-items-center h-40 text-center">
                        <a href="#" class="text-black text-xl">
                            All items in your shopping basket are in stock and can be shipped immediately.
                        </a>
                    </article>
                </div>

            </div>
        </div>
    </div>
    <!-- Full-width description -->
    <div class="col-span-full px-4 lg:px-24 border-primary border-t pt-8 mt-6">
        <!-- Shipping costs -->
        <div class="border-2 border-primary rounded-md p-4 font-italic">
            <article class="grid place-items-center h-40 w-full text-center">
                <a href="#" class="text-black text-xl">
                    The shipping costs are calculated at the checkout page.
                </a>
            </article>
        </div>
    </div>
    </div>
    <!-- Popular products -->
    <div class="w-full  py-5 px-4">
        <h2 class="text-black font-bold text-center text-3xl">Recomended</h2>
    </div>

    <div
        class="container mx-auto py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 gap-y-10 place-items-center mb-4">
        <!-- Single Product Card -->
        @foreach ($recommendedProducts as $product)
            <div class="block border rounded shadow overflow-hidden w-60 col-span-1">
                <div class="relative h-64 flex items-center justify-center">
                    <img src="{{ asset('storage/uploads/images/' . $product->product_category . '/' . $product->product_image) }}"
                        alt="thumb1" class="object-cover" />
                </div>
                <div class="p-4 col-span-1">
                    <h3 class="font-bold text-l">{{ $product->product_visible_name }}</h3>
                    <p class="text-sm">{{ $product->product_price }}€</p>
                    <p class="text-sm text-gray-600">3 colors</p>
                    <div class="flex justify-end mt-2">
                        <button class="text-xl">🛒</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@vite(['resources/js/updateQuantity.js'])
@guest
    @vite(['resources/js/handleCartProductLoad.js', 'resources/js/redirectToCheckout.js'])
@endguest