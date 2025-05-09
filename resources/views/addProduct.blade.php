@extends('layout.app')

@section('content')
  <div class="grid w-full absolute left-0 top-20 p-4 grid-rows-1 grid-cols-1">
    <div class="w-full rounded-md border-1 border-outline flex flex-col">
    <p class="w-full text-xl px-8 py-2 font-bold text-primary">Adding New Product</p>
    <form action="{{ route('addProductStore') }}" enctype="multipart/form-data" method="post">
      @csrf
      <div
      class="center border border-outline rounded-md sm:m-4 sm:mt-0 relative grid grid-rows-12 grid-cols-1 lg:grid-rows-6 lg:grid-cols-3">
      <!-- MAIN IMAGE -->
      <div
        class="row-span-2 lg:row-span-4 lg:col-span-1 lg:col-start-1 lg:row-start-1 flex justify-center items-center my-4">
        <img src="{{ asset('images/uploadImage.png') }}" alt="uploadImage"
        class="w-60 h-60 lg:w-80 lg:h-80 border hover:blur-md hover:bg-stone-400 hover:cursor-pointer"
        id="bigImage" />
      </div>
      <!-- SMALLER IMAGES -->
      <div class="row-span-1 row-start-3 lg:row-span-1 lg:col-span-1 lg:col-start-1 lg:row-start-5 flex px-10 gap-6">
        <img src="{{ asset('images/uploadImage.png') }}" alt="uploadImage" class="w-20 h-20 border" id="smallImage" />
      </div>
      <!-- PRODUCT NAME INPUT -->
      <div class="row-span-1 row-start-4 lg:row-span-1 lg:col-span-1 lg:col-start-2 lg:row-start-1 flex flex-col p-2">
        <label for="product_visible_name">Product Name <span class="text-red-600">*</span></label>
        <input id="product_visible_name" name="product_visible_name" type="text"
        class="w-full h-10 bg-gray-200 rounded-sm px-2" required />
      </div>
      <!-- PRICE INPUT -->
      <div class="row-span-1 row-start-5 lg:row-span-1 lg:col-span-1 lg:col-start-3 lg:row-start-1 flex flex-col p-2">
        <label for="price">Price <span class="text-red-600">*</span></label>
        <input id="price" name="product_price" type="number" class="w-full h-10 bg-gray-200 rounded-sm px-2"
        required />
      </div>
      <!-- CATEGORY SELECTION INPUT -->
      <div class="row-span-1 row-start-6 lg:row-span-1 lg:col-span-1 lg:col-start-2 lg:row-start-2 flex flex-col p-2">
        <label for="category">Product Category <span class="text-red-600">*</span></label>
        <select name="product_category" class="w-full h-10 bg-gray-200 rounded-sm px-2" required
        id="product_category">
        <option value="guitar">Guitar</option>
        <option value="bass">Bass</option>
        <option value="amp">Amp</option>
        </select>
      </div>
      <!-- AVAILABILE COLORS SELECTION INPUT -->
      <div class="row-span-1 row-start-7 lg:row-span-1 lg:col-span-1 lg:col-start-3 lg:row-start-2 p-2">
        <label for="colors">Available Colors <span class="text-red-600">*</span></label>
        <div class="flex justify-center items-center gap-4 py-2" id="colors">
        <input id="redColor" name="product_color" value="red" type="radio"
          class="h-6 w-6 rounded-sm accent-primary" />
        <label for="redColor">Crimson Red</label>
        <input id="blueColor" name="product_color" value="blue" type="radio"
          class="h-6 w-6 rounded-sm accent-primary" />
        <label for="blueColor">Blueish Blue</label>
        <input id="blackColor" name="product_color" value="black" type="radio"
          class="h-6 w-6 rounded-sm accent-primary" />
        <label for="blackColor">Pitch Black</label>
        </div>
      </div>
      <!-- DESCRIPTION INPUT -->
      <div class="row-span-1 row-start-8 lg:row-span-1 lg:col-span-1 lg:col-start-2 lg:row-start-3 flex flex-col p-2">
        <label for="product_description">Product Description <span class="text-red-600">*</span></label>
        <textarea id="product_description" name="product_description" class="w-full bg-gray-200 rounded-sm px-2"
        rows="2" required></textarea>
      </div>

      <!-- QUANTITY INPUT -->
      <div class="row-span-1 row-start-9 lg:row-span-1 lg:col-span-1 lg:col-start-3 lg:row-start-3 flex flex-col p-2">
        <label for="quantity">Quantity <span class="text-red-600">*</span></label>
        <input id="quantity" name="quantity" type="number" class="w-full h-10 bg-gray-200 rounded-sm px-2" required />
      </div>

      <!-- PRODUCT IMAGE UPLOAD -->
      <div class="row-span-2 row-start-10 lg:row-span-2 lg:col-span-2 lg:col-start-2 lg:row-start-4 p-2">
        <div
        class="w-full h-full bg-gray-200 rounded-md flex flex-col items-center justify-center gap-2 border border-dashed">
        {{-- <p class="font-bold text-lg text-primary">Drag and Drop an image to Upload</p> --}}
        {{-- <p>or</p> --}}
        <label for="fileInput"
          class="bg-primary text-white h-10 w-48 rounded-md cursor-pointer flex justify-center items-center">Browse
          Files
          <input id="fileInput" name="product_image[]" class="hidden" type="file" multiple />
        </label>
        </div>
      </div>

      <!-- BUTTONS SECTION -->
      <div
        class="row-span-1 w-full row-start-12 lg:row-span-1 lg:row-start-6 lg:col-span-3 flex flex-col sm:flex-row sm:justify-between items-center px-10 gap-4">
        <a href="{{ route('adminPage') }}">
        <button class="text-primary border border-primary h-10 w-80 sm:w-48 px-10 rounded-md cursor-pointer"
          type="button">
          Go back
        </button>
        </a>

        <button type="submit" class="bg-primary text-white h-10 w-80 sm:w-48 px-10 rounded-md cursor-pointer">
        Save Changes
        </button>
      </div>
      </div>
    </form>
    </div>
  </div>
@endsection

@vite(['resources/js/reloadFormImages.js', 'resources/js/clearImage.js'])