@extends('layout.app')

@section('content')

  <div class="grid w-full absolute left-0 top-20 gap-4 p-4 grid-rows-1 grid-cols-1 pb-14">
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
      <div class="bg-primary w-full h-10 rounded-t-md flex justify-center items-center text-white font-bold"></div>
      <div>
      <!-- PRODUCT DETAILS -->
      <div
        class="w-full h-100 sm:h-40 border border-outline flex flex-col sm:flex-row justify-between items-center p-8 md:p-4 lg:p-8">
        <div class="flex gap-4 sm:gap-10 lg:gap-20 items-center">
        <img src="/images/guitars/guitar_placeholder.webp" alt="guitarPlaceholder" class="w-30 h-30 border" />
        <div class="text-lg">
          <p class="text-xl font-bold">Product Name</p>
          <p>
          Category:
          <span>Guitar</span>
          </p>
          <p>
          Price:
          <span class="font-bold text-primary px-2 sm:px-8">600 €</span>
          </p>
        </div>
        </div>

        <p class="sm:w-80 md:w-40 md:h-30 lg:w-80">
        The guitar is a fretted, stringed musical instrument typically made of wood, with six strings
        stretched over a flat or slightly curved body...
        </p>

        <div class="flex flex-col gap-4">
        <a href="{{ route('editProduct') }}">
          <button class="bg-primary text-white h-10 w-48 px-10 rounded-md cursor-pointer">
          Edit Product
          </button>
        </a>
        <button class="text-primary border border-primary h-10 w-48 px-10 rounded-md cursor-pointer">
          Delete Product
        </button>
        </div>
      </div>

      <!-- PRODUCT DETAILS -->
      <div
        class="w-full h-100 sm:h-40 border border-outline flex flex-col sm:flex-row justify-between items-center p-8">
        <div class="flex gap-4 sm:gap-10 lg:gap-20 items-center">
        <img src="/images/basses/bassPlaceholder.webp" alt="bassPlaceholder" class="w-30 h-30 border" />
        <div class="text-lg">
          <p class="text-xl font-bold">Product Name</p>
          <p>
          Category:
          <span>Guitar</span>
          </p>
          <p>
          Price:
          <span class="font-bold text-primary px-2 sm:px-8">600 €</span>
          </p>
        </div>
        </div>
        <p class="sm:w-80 md:w-40 md:h-30 lg:w-80">
        The guitar is a fretted, stringed musical instrument typically made of wood, with six strings
        stretched over a flat or slightly curved body...
        </p>
        <div class="flex flex-col gap-4">
        <a href="{{ route('editProduct') }}">
          <button class="bg-primary text-white h-10 w-48 px-10 rounded-md cursor-pointer">
          Edit Product
          </button>
        </a>
        <button class="text-primary border border-primary h-10 w-48 px-10 rounded-md cursor-pointer">
          Delete Product
        </button>
        </div>
      </div>

      <!-- PRODUCT DETAILS -->
      <div
        class="w-full h-100 sm:h-40 border border-outline flex flex-col sm:flex-row justify-between items-center p-8">
        <div class="flex gap-4 sm:gap-10 lg:gap-20 items-center">
        <img src="/images/amps/ampPlaceholder.webp" alt="ampPlaceholder" class="w-30 h-30 border" />
        <div class="text-lg">
          <p class="text-xl font-bold">Product Name</p>
          <p>
          Category:
          <span>Guitar</span>
          </p>
          <p>
          Price:
          <span class="font-bold text-primary px-2 sm:px-8">600 €</span>
          </p>
        </div>
        </div>
        <p class="sm:w-80 md:w-40 md:h-30 lg:w-80">
        The guitar is a fretted, stringed musical instrument typically made of wood, with six strings
        stretched over a flat or slightly curved body...
        </p>
        <div class="flex flex-col gap-4">
        <a href="{{ route('editProduct') }}">
          <button class="bg-primary text-white h-10 w-48 px-10 rounded-md cursor-pointer">
          Edit Product
          </button>
        </a>
        <button class="text-primary border border-primary h-10 w-48 px-10 rounded-md cursor-pointer">
          Delete Product
        </button>
        </div>
      </div>
      </div>



      <!-- PAGINATOR -->
      <div class="w-full h-14 flex justify-between items-center p-2">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="bg-primary text-white h-10 w-40 rounded-md cursor-pointer" type="submit">
        Log out
        </button>
      </form>

      <nav class="w-full h-full">
        <ul class="w-full h-full flex gap-2 items-center justify-center lg:justify-end px-10 font-bold">
        <li>
          < </li>
        <li class="flex text-white bg-primary w-6 h-8 justify-center items-center rounded-lg">1</li>
        <li class="flex w-6 h-8 justify-center items-center rounded-lg">2</li>
        <li class="flex w-6 h-8 justify-center items-center rounded-lg">3</li>
        <li class="flex w-6 h-8 justify-center items-center rounded-lg">4</li>
        <li class="flex w-6 h-8 justify-center items-center rounded-lg">5</li>
        <li>></li>
        </ul>
      </nav>
      </div>
    </div>
    </div>
  </div>
@endsection