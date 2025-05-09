@extends('layout.app')

@section('content')
    <div class="grid w-full absolute left-0 top-20 gap-4 p-4 grid-rows-1 grid-cols-1 pb-14">

        <!-- Search bar -->
        <div class="container mx-auto px-25 py-4">
            <input type="text" placeholder="🔍Search..."
                class="bg-gray-200 w-full p-2 border rounded shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-400"
                onkeydown="search(event, this, '{{ route('admin.search') }}')" />
        </div>

        <div class="w-full rounded-md border-1 border-outline flex flex-col">
            <div class="w-full flex justify-between items-center pt-2 px-4">
                <p class="w-full text-lg sm:text-xl px-8 py-2 font-bold text-[#DC443C]">Products</p>
                <a href="{{ route('addProduct') }}" class="h-10 w-80">
                    <button class="bg-primary text-sm sm:text-lg text-white w-full h-full px-10 rounded-md cursor-pointer">
                        Add Product
                    </button>
                </a>
            </div>

            <!-- PRODUCTS LIST CONTAINER -->
            <div class="center border border-outline rounded-md sm:m-4 relative">
                <div class="bg-primary w-full h-10 rounded-t-md flex justify-center items-center text-white font-bold">
                </div>
                <div>
                    @foreach ($products as $product)
                        <!-- PRODUCT DETAILS -->
                        <div
                            class="w-full h-100 sm:h-40 border border-outline flex flex-col sm:flex-row justify-between items-center p-8 md:p-4 lg:p-8">
                            <div class="flex gap-4 sm:gap-10 lg:gap-20 items-center object-cover">
                                <img src="{{ asset('storage/uploads/images/' . $product->product_category . '/' . $product->product_image)}}"
                                    alt="guitarPlaceholder" class="w-30 h-30 border" />
                                <div class="text-lg">
                                    <p class="text-xl font-bold">{{ $product->product_visible_name }}</p>
                                    <p>
                                        Category:
                                        <span>{{ $product->product_category }}</span>
                                    </p>
                                    <p>
                                        Price:
                                        <span class="font-bold text-primary px-2 sm:px-8">{{ $product->product_price }}
                                            €</span>
                                    </p>
                                </div>
                            </div>
                            <p class="sm:w-80 md:w-40 md:h-30 lg:w-80">
                                {{ $product->product_description }}
                            </p>
                            <div class="flex flex-col gap-4">
                                <a href="{{ route('products.editProduct', $product->id) }}">
                                    <button class="bg-primary text-white h-10 w-48 px-10 rounded-md cursor-pointer">
                                        Edit Product
                                    </button>
                                </a>
                                <form action="{{ route('products.deleteProduct', $product->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-primary border border-primary h-10 w-48 px-10 rounded-md cursor-pointer">
                                        Delete Product
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <!-- PAGINATOR -->
                    <div class="w-full h-14 flex justify-between items-center p-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="bg-primary text-white h-10 w-40 rounded-md cursor-pointer" type="submit">
                                Log out
                            </button>
                        </form>

                        <div
                            class="w-full h-full flex gap-2 relative left-100 bottom-4 items-center justify-center lg:justify-end px-10 font-bold">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

    @vite('resources/js/app.js')