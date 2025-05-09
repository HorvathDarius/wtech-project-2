@vite('resources/js/app.js')
@extends('layout.app')
@section('content')
    <main class="pb-14">
        <!-- Banner section -->
        <div class="relative h-50 overflow-hidden">
            <img src="{{ asset('/images/amp/amp_placeholder.webp') }}" alt="Guitar Banner"
                class="w-full h-full object-cover filter blur-sm" />

            <!-- Content over banner -->
            <div class="absolute inset-0 flex items-center justify-center z-10">
                <h1 class="text-white text-3xl md:text-5xl font-bold">Amps</h1>
            </div>
        </div>

        <!-- Search bar -->
        <div class="container mx-auto px-25 py-4">
            <input type="text" placeholder="🔍Search..."
                class="bg-gray-200 w-full p-2 border rounded shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-400"
                onkeydown="search(event, this, '{{ route('products.search', ['category' => 'amp']) }}')" />
        </div>

        <!-- Filters and Sort -->
        <div class="container mx-auto px-20 grid grid-cols-1 md:grid-cols-[3fr_1fr] gap-0">
            <!-- Filters -->
            <div class="bg-white border rounded shadow">
                <div class="bg-primary text-white px-4 py-2 rounded-t font-bold mb-4 text-center">Filters</div>
                <form action="{{ route('products.filter', ['category' => 'amp']) }}" method="get"
                    class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
                    @csrf
                    <!-- Color -->
                    <div>
                        <h4 class="font-semibold mb-2">Color</h4>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" id="hovno" name="colors[]" value="red"
                                {{ in_array('red', $colors ?? []) ? 'checked' : '' }} class="accent-primary" />
                            <span>Crimson Red</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="colors[]" value="blue"
                                {{ in_array('blue', $colors ?? []) ? 'checked' : '' }} class="accent-primary" />
                            <span>Blueish Blue</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="colors[]" value="black"
                                {{ in_array('black', $colors ?? []) ? 'checked' : '' }} class="accent-primary" />
                            <span>Pitch Black</span>
                        </label>
                    </div>

                    <!-- In stock -->
                    <div>
                        <h4 class="font-semibold mb-2">Stock</h4>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="stock" value="in_stock"
                                {{ ($stocks ?? '') === 'in_stock' ? 'checked' : '' }} class="accent-primary" />
                            <span>In stock</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="stock" value="sold_out"
                                {{ ($stocks ?? '') === 'sold_out' ? 'checked' : '' }} class="accent-primary" />
                            <span>Sold out</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="stock" value="all"
                                {{ ($stocks ?? '') === 'all' ? 'checked' : '' }} class="accent-primary" />
                            <span>All</span>
                        </label>
                    </div>

                    <!-- Price -->
                    <div>
                        <h4 class="font-semibold mb-2">Price</h4>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="price_category[]" value="price_category_1"
                                {{ in_array('price_category_1', $prices ?? []) ? 'checked' : '' }} class="accent-primary" />
                            <span>0€ - 250€</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="price_category[]" value="price_category_2"
                                {{ in_array('price_category_2', $prices ?? []) ? 'checked' : '' }}
                                class="accent-primary" />
                            <span>250€ - 500€</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="price_category[]" value="price_category_3"
                                {{ in_array('price_category_3', $prices ?? []) ? 'checked' : '' }}
                                class="accent-primary" />
                            <span>500€ +</span>
                        </label>
                    </div>
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md cursor-pointer sm:col-start-3">
                        Show Results
                    </button>
                </form>
            </div>

            <!-- Sort -->
            <div class="px-2">
                <select name="sortSelect" id="sortables"
                    class="w-full mt-4 sm:mt-0 bg-primary text-white px-4 py-2 text-sm rounded-md focusw-full cursor-pointer">
                    <!-- <option selected>Sort</option> -->
                    <option value="Lowest-Price" {{ ($sort ?? '') === 'Lowest-Price' ? 'selected' : '' }}>
                        Lowest Price</option>
                    <option value="Highest-Price" {{ ($sort ?? '') === 'Highest-Price' ? 'selected' : '' }}>
                        Highest Price</option>
                    <option value="Product-Name-A-Z" {{ ($sort ?? '') === 'Product-Name-A-Z' ? 'selected' : '' }}>
                        Product Name A- Z</option>
                    <option value="Product-Name-Z-A" {{ ($sort ?? '') === 'Product-Name-Z-A' ? 'selected' : '' }}>
                        Product Name Z - A</option>
                </select>
            </div>
        </div>

        <!-- Product Grid -->
        <div
            class="container mx-auto py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 gap-10 place-items-center">
            @foreach ($products as $item)
                <!-- Single Product Card -->
                <a href="{{ url('product/' . $item->product_link_name) }}"
                    class="border rounded shadow overflow-hidden w-60 col-span-1">
                    <div class="relative h-64 flex items-center justify-center">
                        <img src="{{ asset('storage/uploads/images/amp/' . $item->product_image) }}" alt="thumb1"
                            class="object-cover" />
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
        {{ $products->links() }}
    </main>
@endsection
