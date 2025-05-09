@extends('layout.app')

@section('content')
    <main class="w-full h-full overflow-scroll">
        <div class="grid w-full absolute left-0 top-20 p-4 grid-rows-1 grid-cols-1">
            <div class="w-full rounded-md border-1 border-outline flex flex-col">
                <p class="w-full text-xl px-8 py-2 font-bold text-primary">Editing Product</p>
                <form action="{{ route('products.editProduct', ['id' => $product->id]) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div
                        class="center border border-outline rounded-md sm:m-4 sm:mt-0 relative grid grid-rows-12 grid-cols-1 lg:grid-rows-6 lg:grid-cols-3">
                        <!-- MAIN IMAGE -->
                        <div
                            class="row-span-2 lg:row-span-4 lg:col-span-1 lg:col-start-1 lg:row-start-1 flex justify-center items-center my-4">
                            <img src="{{ asset('storage/uploads/images/' . $product->product_category . '/' . $product->product_image)}}"
                                alt="Product Image Main" class="w-60 h-60 lg:w-80 lg:h-80 border" />
                        </div>

                        <!-- SMALLER IMAGES -->
                        <div
                            class="row-span-1 row-start-3 lg:row-span-1 lg:col-span-1 lg:col-start-1 lg:row-start-5 flex px-10 gap-6">
                            <img src="{{ asset('storage/uploads/images/' . $product->product_category . '/' . $product->product_image)}}"
                                alt="Product Image Small" class="w-20 h-20 border" />
                            <img src="{{ asset('storage/uploads/images/' . $product->product_category . '/' . $product->product_image)}}"
                                alt="Product Image Small" class="w-20 h-20 border object-cover" />
                        </div>

                        <!-- PRODUCT NAME INPUT -->
                        <div
                            class="row-span-1 row-start-4 lg:row-span-1 lg:col-span-1 lg:col-start-2 lg:row-start-1 flex flex-col p-2">
                            <label for="productName">Product Name <span class="text-red-600">*</span></label>
                            <input id="productName" name="product_visible_name" type"="text"
                                class="w-full h-10 bg-gray-200 rounded-sm" value="{{ $product->product_visible_name }}"
                                required />
                        </div>

                        <!-- PRICE INPUT -->
                        <div
                            class="row-span-1 row-start-5 lg:row-span-1 lg:col-span-1 lg:col-start-3 lg:row-start-1 flex flex-col p-2">
                            <label for="product_price">Price <span class="text-red-600">*</span></label>
                            <input id="product_price" name="product_price" type="number"
                                class="w-full h-10 bg-gray-200 rounded-sm" required value="{{ $product->product_price }}" />
                        </div>

                        <!-- CATEGORY SELECTION -->
                        <div
                            class="row-span-1 row-start-6 lg:row-span-1 lg:col-span-1 lg:col-start-2 lg:row-start-2 flex flex-col p-2">
                            <label for="category">Product Category <span class="text-red-600">*</span></label>
                            <select name="product_category" class="w-full h-10 bg-gray-200 rounded-sm" required>
                                <option value="guitar" {{ $product->product_category === 'guitar' ? 'selected' : '' }}>
                                    Guitar
                                </option>
                                <option value="bass" {{ $product->product_category === 'bass' ? 'selected' : '' }}>Bass
                                </option>
                                <option value="amp" {{ $product->product_category === 'amp' ? 'selected' : '' }}>Amp
                                </option>
                            </select>
                        </div>

                        <!-- AVAILABLE COLORS SELECTION -->
                        <div class="row-span-1 row-start-7 lg:row-span-1 lg:col-span-1 lg:col-start-3 lg:row-start-2 p-2">
                            <label for="colors">Available Colors <span class="text-red-600">*</span></label>
                             <div class="flex justify-center items-center gap-4 py-2" id="colors">
                                <input id="red" name="product_color" value="red" type="radio"
                                    class="h-6 w-6 accent-primary rounded-sm"
                                    {{ $product->product_color === 'red' ? 'checked' : '' }} />
                                <label for="red">Crimson Red</label>
                                <input id="blue" name="product_color" value="blue" type="radio"
                                    class="h-6 w-6 accent-primary rounded-sm"
                                    {{ $product->product_color === 'blue' ? 'checked' : '' }} />
                                <label for="blue">Blueish Blue</label>
                                <input id="black" name="product_color" value="black" type="radio"
                                    class="h-6 w-6 accent-primary rounded-sm"
                                    {{ $product->product_color === 'black' ? 'checked' : '' }} />
                                <label for="black">Pitch Black</label>
                            </div>
                        </div>

                        <!-- DESCRIPTION INPUT -->
                        <div
                            class="row-span-1 row-start-8 lg:row-span-1 lg:col-span-2 lg:col-start-2 lg:row-start-3 flex flex-col p-2">
                            <label for="product_description">Product Description <span class="text-red-600">*</span></label>
                            <textarea id="product_description" name="product_description" class="w-full bg-gray-200 rounded-sm" rows="2"
                                required>
    {{ $product->product_description }}
    </textarea>
                        </div>

                        <!-- PRODUCT IMAGE UPLOAD -->
                        <div class="row-span-2 row-start-9 lg:row-span-2 lg:col-span-2 lg:col-start-2 lg:row-start-4 p-2">
                            <div
                                class="w-full h-full bg-gray-200 rounded-md flex flex-col items-center justify-center gap-2 border border-dashed">
                                <p class="font-bold text-lg text-primary">Drag and Drop an image to Upload</p>
                                <p>or</p>
                                <label for="fileInput"
                                    class="bg-primary text-white h-10 w-48 rounded-md cursor-pointer flex justify-center items-center">Browse
                                    Files
                                    <input id="fileInput" name="product_image" class="hidden" type="file" />
                                </label>
                            </div>
                        </div>

                        <!-- BUTTONS SECTION -->
                        <div
                            class="row-span-2 w-full row-start-11 lg:row-span-1 lg:row-start-6 lg:col-span-3 flex flex-col sm:flex-row sm:justify-between items-center px-8">
                            <div class="p-4">
                                <a href="{{ route('adminPage') }}">
                                    <button
                                        class="text-primary border border-primary h-10 w-48 px-10 rounded-md cursor-pointer"
                                        type="button">
                                        Go back
                                    </button>
                                </a>
                            </div>
                            <div class="flex flex-col md:flex-row gap-4">
                                <button class="text-primary border border-primary h-10 w-48 px-10 rounded-md cursor-pointer"
                                    type="button">
                                    Delete Product
                                </button>
                                <button type="submit"
                                    class="bg-primary text-white h-10 w-48 px-10 rounded-md cursor-pointer">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
