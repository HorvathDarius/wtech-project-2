@extends('layout.app')
@section('content')
    <main class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-x-12 mt-8 md:gap-x-5 pb-14">
        <!-- Images section -->
        <div class="grid grid-cols-5 grid-rows-4 mb-5 gap-2">
            <!-- Thumbnails -->
            <div class="lg:w-32 lg:h-32 md:w-20 md:h-20  sm:w-24 sm:h-full  w-full h-full col-start-1 row-start-1">
                <img src="\images\guitars\guitar_placeholder.webp" alt="thumb1" class="object-cover" />
            </div>
            <div class="lg:w-32 lg:h-32 md:w-20 md:h-20 sm:w-24 sm:h-full w-full h-full col-start-1 row-start-2">
                <img src="\images\guitars\guitar_placeholder.webp" alt="thumb2" class="object-cover" />
            </div>
            <div class="lg:w-32 lg:h-32 md:w-20 md:h-20 sm:w-24 sm:h-full h-full col-start-1 row-start-3">
                <img src="\images\guitars\guitar_placeholder.webp" alt="thumb3" class="object-cover" />
            </div>
            <div class="lg:w-32 lg:h-32 md:w-20 md:h-20 sm:w-24 sm:h-full h-full col-start-1 row-start-4">
                <img src="\images\guitars\guitar_placeholder.webp" alt="thumb4" class="object-cover" />
            </div>

            <!-- Main image -->
            <div
                class="md:rows-span-4 md:col-span-5 row-span-4 col-span-5 col-start-2 row-start-1 bg-gray-300 max-w-120 max-h-full lg:max-w-150 lg:max-h-150 border border-gray-400">
                <img src="\images\guitars\guitar_placeholder.webp" alt="main" class="w-full h-full object-cover" />
            </div>
        </div>

        <!-- Product Info section -->
        <div>
            <h2 class="text-xl font-semibold">{{ $products->product_visible_name }}</h2>

            <!-- Color selection -->
            <div class="border rounded p-3 mb-4">
                <p class="font-semibold mb-1">Color:</p>
                <div class="space-y-1 accent-primary">

                    <label class="flex items-center space-x-2">
                        <a href="{{ url('guitars/' . $products->product_visible_name . '-' . 'red') }}"
                            title="red-guitar-version">
                            <span class="text-primary font-medium">Crimson red</span>
                        </a>
                    </label>
                    <label class="flex items-center space-x-2">
                        <a href="{{ url('guitars/' . $products->product_visible_name . '-' . 'blue') }}"
                            title="red-guitar-v                                ersion">
                            <span class="text-blue-600">Blueish blue</span>
                        </a>
                    </label>
                    <label class="flex items-center space-x-2">
                        <a href="{{ url('guitars/' . $products->product_visible_name . '-' . 'black') }}"
                            title="red-guitar-version">
                            <span class="text-black">Pitch black</span>
                        </a>
                    </label>

                </div>

            </div>

            <!-- Price and stock -->
            <div class="mb-2">
                @if ($products->quantity > 0)
                    <p class="text-sm text-green-600">{{ $products->quantity }} on stock</p>
                @else
                    <p class="text-sm text-red-600">out of stock</p>
                @endif
                <p class="text-primary font-bold text-xl">{{ $products->product_price }} €</p>
            </div>

            <!-- Quantity & Button -->
            <div class="flex items-center space-x-4">
                <input type="number" value="1" min="1" max="100" step="1"
                    class="border rounded p-1" />
                <a href="{{ route('cart') }}">
                    <button class="bg-primary hover:bg-primary text-white px-4 py-2 rounded">Add to Cart</button>
                </a>
            </div>
        </div>

        <!-- Full-width description -->
        <div class="md:col-span-2 border-t pt-4 mt-6">
            <h3 class="font-semibold mb-2 text-gray-700">Description:</h3>
            <p class="w-full border rounded p-2 mb-4" rows="4" placeholder="Product details here...">
                {{ $products->product_description }}
            </p>
        </div>
    </main>
@endsection
