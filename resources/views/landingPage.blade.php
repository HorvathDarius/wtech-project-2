@extends('layout.app')

@section('content')
    <main class="pb-14">
        <!-- Banner section -->
        <div class="relative h-150 overflow-hidden py-8">
            <picture class="w-full h-full block">
                <source media="(min-width: 768px)" srcset="{{ asset('storage/uploads/images/guitar/badass_guitar.png') }}" />
                <img src="{{ asset('storage/uploads/images/guitar/promotion_vertical.png') }}" alt="Guitar"
                    class="w-full h-full object-cover" />
            </picture>

            <!-- Content over banner -->
            <div class="absolute inset-0 grid md:place-items-end md:pr-16 z-10">
                <div
                    class="text-right space-y-4 md:-translate-y-16 md:-translate-x-4 transform translate-y-50 -translate-x-4">
                    <h1 class="text-black text-sm md:text-5xl font-bold">New limited time offer</h1>
                    <a href="{{ route('productPage') }}">
                        <button
                            class="bg-primary hover:bg-red-600 text-white text-sm md:text-lg md:px-6 px-1 py-1 rounded-md cursor-pointer">
                            Learn More
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Popular products -->
        <div class="w-full bg-primary py-2 px-4">
            <h2 class="text-white font-bold text-sm">Popular Products</h2>
        </div>

        <div
            class="container mx-auto py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 gap-y-10 place-items-center">
            <!-- Single Product Card -->
            @foreach ($popularProducts as $item)
                <!-- Single Product Card -->
                <a href="{{ url('product/' . $item->product_link_name) }}"
                    class="border rounded shadow overflow-hidden w-60 col-span-1">
                    <div class="relative h-64 flex items-center justify-center">
                        <img src="{{ asset('storage/uploads/images/' . $item->product_category . '/' . $item->product_image) }}"
                            alt="thumb1" class="object-cover" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-l">{{ $item->product_visible_name }}</h3>
                        <p class="text-sm">{{ $item->product_price }} €</p>
                        <p class="text-sm text-gray-600">3 colors</p>
                        <div class="flex justify-end mt-2">
                            <button class="text-xl">🛒</button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <!-- Products on sale -->
        <div class="w-full bg-primary py-2 px-4">
            <h2 class="text-white font-bold text-sm">Products on sale</h2>
        </div>
        <div
            class="container mx-auto py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 gap-y-10 place-items-center">
            <!-- Single Product Card -->
            @foreach ($productsOnSale as $item)
                <!-- Single Product Card -->
                <a href="{{ url('product/' . $item->product_link_name) }}"
                    class="border rounded shadow overflow-hidden w-60 col-span-1">
                    <div class="relative h-64 flex items-center justify-center">
                        <img src="{{ asset('storage/uploads/images/' . $item->product_category . '/' . $item->product_image) }}"
                            alt="thumb1" class="object-cover" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-l">{{ $item->product_visible_name }}</h3>
                        <p class="text-sm">{{ $item->product_price }} €</p>
                        <p class="text-sm text-gray-600">3 colors</p>
                        <div class="flex justify-end mt-2">
                            <button class="text-xl">🛒</button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endsection
