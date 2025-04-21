@extends('layout.app')

@section('content')
  <p class="w-full text-2xl px-8 py-2 mt-8 font-bold text-black">
    Your Shopping Basket
  </p>
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 px-4">

    <!-- Table of products -->
    <div class="lg:col-span-1 col-span-1 w-full">
    <div class="overflow-x-auto">
      <table class="w-full table-auto border-collapse">
      <tbody>
        <!-- Product in the basket -->
        <tr class="h-28">
        <td class="p-1">
          <div class="grid grid-cols-[1fr_4fr_1fr] border rounded shadow overflow-hidden w-full h-28">
          <div class="col-start-1 row-span-3 col-span-1 relative w-28 h-28">
            <img src="\images\amps\ampPlaceholder.webp" alt="thumb1" class="object-cover" />
          </div>
          <div class="p-4 col-start-2 col-span-1">
            <h3 class="font-bold text-l">amp placeholder</h3>
            <p class="text-sm">Pitch black</p>
            <p class="text-sm font-bold text-green-700">Available</p>
            <button class="">🗑️</button>
          </div>
          <div class="gap-1 text-center justify-around content-around bg-center">
            <input type="number" value="1" min="1" max="100" step="1" class="border rounded p-1 mx-auto" />
            <p class="font-bold text-3xl text-primary">600€</p>
          </div>
          </div>
        </td>
        </tr>
        <!-- Product in the basket -->
        <tr class="h-28">
        <td class="p-1">
          <div class="grid grid-cols-[1fr_4fr_1fr] border rounded shadow overflow-hidden w-full h-28">
          <div class="col-start-1 row-span-3 col-span-1 relative w-28 h-28">
            <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
          </div>
          <div class="p-4 col-start-2 col-span-1">
            <h3 class="font-bold text-l">bass placeholder</h3>
            <p class="text-sm">Pitch black</p>
            <p class="text-sm font-bold text-green-700">Available</p>
            <button class="">🗑️</button>
          </div>
          <div class="gap-1 text-center justify-around content-around bg-center">
            <input type="number" value="1" min="1" max="100" step="1" class="border rounded p-1 mx-auto" />
            <p class="font-bold text-3xl text-primary">450€</p>
          </div>
          </div>
        </td>
        </tr>
        <!-- Product in the basket -->
        <tr class="h-28">
        <td class="p-1">
          <div class="grid grid-cols-[1fr_4fr_1fr] border rounded shadow overflow-hidden w-full h-28">
          <div class="col-start-1 row-span-3 col-span-1 relative w-28 h-28">
            <img src="\images\guitars\guitar_placeholder.webp" alt="thumb1" class="object-cover" />
          </div>
          <div class="p-4 col-start-2 col-span-1">
            <h3 class="font-bold text-l">guitar placeholder</h3>
            <p class="text-sm">Crimson red</p>
            <p class="text-sm font-bold text-green-700">Available</p>
            <button class="">🗑️</button>
          </div>
          <div class="gap-1 text-center justify-around content-around bg-center">
            <input type="number" value="1" min="1" max="100" step="1" class="border rounded p-1 mx-auto" />
            <p class="font-bold text-3xl text-primary">786€</p>
          </div>
          </div>
        </td>
        </tr>
        <!-- Product in the basket -->
        <tr class="h-28">
        <td class="p-1">
          <div class="grid grid-cols-[1fr_4fr_1fr] border rounded shadow overflow-hidden w-full h-28">
          <div class="col-start-1 row-span-3 col-span-1 relative w-28 h-28">
            <img src="\images\guitars\lava.webp" alt="thumb1" class="object-cover" />
          </div>
          <div class="p-4 col-start-2 col-span-1">
            <h3 class="font-bold text-l">Lava guitar</h3>
            <p class="text-sm">Crimson red</p>
            <p class="text-sm font-bold text-green-700">Available</p>
            <button class="">🗑️</button>
          </div>
          <div class="gap-1 text-center justify-around content-around bg-center">
            <input type="number" value="1" min="1" max="100" step="1" class="border rounded p-1 mx-auto" />
            <p class="font-bold text-3xl text-primary">1000€</p>
          </div>
          </div>
        </td>
        </tr>
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
        <span class="text-primary text-3xl">Total: 2836€</span>
        <a href="checkout.html">
        <button class="bg-primary text-white h-10 w-44 rounded-md cursor-pointer">To Checkout</button>
        </a>
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
    class="container mx-auto py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 gap-y-10 place-items-center">
    <!-- Single Product Card -->
    <div class="block border rounded shadow overflow-hidden w-60 col-span-1">
    <div class="relative h-64 flex items-center justify-center">
      <img src="\images\guitars\guitar_placeholder.webp" alt="thumb1" class="object-cover" />
    </div>
    <div class="p-4 col-span-1">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
      <button class="text-xl">🛒</button>
      </div>
    </div>
    </div>
    <!-- Single Product Card -->
    <div class="hidden sm:block border rounded shadow overflow-hidden w-60 col-span-1">
    <div class="relative h-64 flex items-center justify-center">
      <img src="\images\guitars\guitar_placeholder.webp" alt="thumb1" class="object-cover" />
    </div>
    <div class="p-4 col-span-1">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
      <button class="text-xl">🛒</button>
      </div>
    </div>
    </div>
    <!-- Single Product Card -->
    <div class="hidden md:block border rounded shadow overflow-hidden w-60 col-span-1">
    <div class="relative h-64 flex items-center justify-center">
      <img src="\images\guitars\guitar_placeholder.webp" alt="thumb1" class="object-cover" />
    </div>
    <div class="p-4 col-span-1">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
      <button class="text-xl">🛒</button>
      </div>
    </div>
    </div>
    <!-- Single Product Card -->
    <div class="hidden lg:block border rounded shadow overflow-hidden w-60 col-span-1">
    <div class="relative h-64 flex items-center justify-center">
      <img src="\images\guitars\guitar_placeholder.webp" alt="thumb1" class="object-cover" />
    </div>
    <div class="p-4 col-span-1">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
      <button class="text-xl">🛒</button>
      </div>
    </div>
    </div>
    <!-- Single Product Card -->
    <div class="hidden 2xl:block border rounded shadow overflow-hidden w-60 col-span-1">
    <div class="relative h-64 flex items-center justify-center">
      <img src="\images\guitars\guitar_placeholder.webp" alt="thumb1" class="object-cover" />
    </div>
    <div class="p-4 col-span-1">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
      <button class="text-xl">🛒</button>
      </div>
    </div>
    </div>
    <!-- Single Product Card -->
    <div class="hidden 2xl:block border rounded shadow overflow-hidden w-60 col-span-1">
    <div class="relative h-64 flex items-center justify-center">
      <img src="\images\guitars\guitar_placeholder.webp" alt="thumb1" class="object-cover" />
    </div>
    <div class="p-4 col-span-1">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
      <button class="text-xl">🛒</button>
      </div>
    </div>
    </div>

    <!-- View All button -->
    <div class="col-span-full flex justify-center mb-4">
    <a href="productsGuitars.html">
      <button
      class="bg-primary hover:bg-red-600 text-white text-sm md:text-lg md:px-6 px-4 py-2 rounded-md cursor-pointer">
      View All
      </button>
    </a>
    </div>
  </div>
@endsection