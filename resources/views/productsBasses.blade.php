@extends('layout.app')
@section('content')
  <main class="pb-14">
    <!-- Banner section -->
    <div class="relative h-50 overflow-hidden">
    <img src="\images\basses\bassPlaceholder.webp" alt="Guitar Banner"
      class="w-full h-full object-cover filter blur-sm" />

    <!-- Content over banner -->
    <div class="absolute inset-0 flex items-center justify-center z-10">
      <h1 class="text-white text-3xl md:text-5xl font-bold">Basses</h1>
    </div>
    </div>

    <!-- Search bar -->
    <div class="container mx-auto px-25 py-4">
    <input type="text" placeholder="🔍Search..."
      class="bg-gray-200 w-full p-2 border rounded shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>

    <!-- Filters and Sort -->
    <div class="container mx-auto px-20 grid grid-cols-1 md:grid-cols-[3fr_1fr] gap-0">
    <!-- Filters -->
    <div class="bg-white border rounded shadow">
      <div class="bg-primary text-white px-4 py-2 rounded-t font-bold mb-4 text-center">Filters</div>
      <form class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
      <!-- Color -->
      <div>
        <h4 class="font-semibold mb-2">Color</h4>
        <label class="flex items-center space-x-2">
        <input type="checkbox" checked class="accent-primary" />
        <span>Crimson Red</span>
        </label>
        <label class="flex items-center space-x-2">
        <input type="checkbox" class="accent-primary" />
        <span>Blueish Blue</span>
        </label>
        <label class="flex items-center space-x-2">
        <input type="checkbox" class="accent-primary" />
        <span>Pitch Black</span>
        </label>
      </div>

      <!-- Type -->
      <div>
        <h4 class="font-semibold mb-2">Type</h4>
        <label class="flex items-center space-x-2">
        <input type="checkbox" class="accent-primary" />
        <span>Electric</span>
        </label>
        <label class="flex items-center space-x-2">
        <input type="checkbox" class="accent-primary" />
        <span>Acoustic</span>
        </label>
      </div>

      <!-- Price -->
      <div>
        <h4 class="font-semibold mb-2">Price</h4>
        <label class="flex items-center space-x-2">
        <input type="checkbox" class="accent-primary" />
        <span>0€ - 250€</span>
        </label>
        <label class="flex items-center space-x-2">
        <input type="checkbox" class="accent-primary" />
        <span>250€ - 500€</span>
        </label>
        <label class="flex items-center space-x-2">
        <input type="checkbox" class="accent-primary" />
        <span>500€ +</span>
        </label>
      </div>
      <button class="bg-primary text-white px-4 py-2 rounded-md cursor-pointer sm:col-start-3">
        Show Results
      </button>
      </form>
    </div>

    <!-- Sort -->
    <div class="px-2">
      <form>
      <select id="sortables"
        class="w-full mt-4 sm:mt-0 bg-primary text-white px-4 py-2 text-sm rounded-md focusw-full cursor-pointer">
        <!-- <option selected>Sort</option> -->
        <option value="Lowest-Price">Lowest Price</option>
        <option value="Highest-Price">Highest Price</option>
        <option value="Product-Name-A-Z">Product Name A- Z</option>
        <option value="Product-Name-Z-A">Product Name Z - A</option>
      </select>
      </form>
    </div>
    </div>

    <!-- Product Grid -->
    <div
    class="container mx-auto py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 gap-y-10 place-items-center">
    <!-- Single Product Card -->
    <a href="product_page.html" class="border rounded shadow overflow-hidden w-60 col-span-1">
      <div class="relative h-64 flex items-center justify-center">
      <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
      </div>
      <div class="p-4">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
        <button class="text-xl">🛒</button>
      </div>
      </div>
    </a>

    <!-- Single Product Card -->
    <a href="product_page.html" class="border rounded shadow overflow-hidden w-60 col-span-1">
      <div class="relative h-64 flex items-center justify-center">
      <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
      </div>
      <div class="p-4">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
        <button class="text-xl">🛒</button>
      </div>
      </div>
    </a>

    <!-- Single Product Card -->
    <a href="product_page.html" class="border rounded shadow overflow-hidden w-60 col-span-1">
      <div class="relative h-64 flex items-center justify-center">
      <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
      </div>
      <div class="p-4">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
        <button class="text-xl">🛒</button>
      </div>
      </div>
    </a>

    <!-- Single Product Card -->
    <a href="product_page.html" class="border rounded shadow overflow-hidden w-60 col-span-1">
      <div class="relative h-64 flex items-center justify-center">
      <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
      </div>
      <div class="p-4">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
        <button class="text-xl">🛒</button>
      </div>
      </div>
    </a>

    <!-- Single Product Card -->
    <a href="product_page.html" class="border rounded shadow overflow-hidden w-60 col-span-1">
      <div class="relative h-64 flex items-center justify-center">
      <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
      </div>
      <div class="p-4">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
        <button class="text-xl">🛒</button>
      </div>
      </div>
    </a>

    <!-- Single Product Card -->
    <a href="product_page.html" class="border rounded shadow overflow-hidden w-60 col-span-1">
      <div class="relative h-64 flex items-center justify-center">
      <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
      </div>
      <div class="p-4">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
        <button class="text-xl">🛒</button>
      </div>
      </div>
    </a>

    <!-- Single Product Card -->
    <a href="product_page.html" class="border rounded shadow overflow-hidden w-60 col-span-1">
      <div class="relative h-64 flex items-center justify-center">
      <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
      </div>
      <div class="p-4">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
        <button class="text-xl">🛒</button>
      </div>
      </div>
    </a>

    <!-- Single Product Card -->
    <a href="product_page.html" class="border rounded shadow overflow-hidden w-60 col-span-1">
      <div class="relative h-64 flex items-center justify-center">
      <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
      </div>
      <div class="p-4">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
        <button class="text-xl">🛒</button>
      </div>
      </div>
    </a>

    <!-- Single Product Card -->
    <a href="product_page.html" class="border rounded shadow overflow-hidden w-60 col-span-1">
      <div class="relative h-64 flex items-center justify-center">
      <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
      </div>
      <div class="p-4">
      <h3 class="font-bold text-lg">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
        <button class="text-xl">🛒</button>
      </div>
      </div>
    </a>

    <!-- Single Product Card -->
    <a href="product_page.html" class="border rounded shadow overflow-hidden w-60 col-span-1">
      <div class="relative h-64 flex items-center justify-center">
      <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
      </div>
      <div class="p-4">
      <h3 class="font-bold text-lg">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
        <button class="text-xl">🛒</button>
      </div>
      </div>
    </a>

    <!-- Single Product Card -->
    <a href="product_page.html" class="border rounded shadow overflow-hidden w-60 col-span-1">
      <div class="relative h-64 flex items-center justify-center">
      <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
      </div>
      <div class="p-4">
      <h3 class="font-bold text-lg">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
        <button class="text-xl">🛒</button>
      </div>
      </div>
    </a>

    <!-- Single Product Card -->
    <a href="product_page.html" class="border rounded shadow overflow-hidden w-60 col-span-1">
      <div class="relative h-64 flex items-center justify-center">
      <img src="\images\basses\bassPlaceholder.webp" alt="thumb1" class="object-cover" />
      </div>
      <div class="p-4">
      <h3 class="font-bold text-l">Product name</h3>
      <p class="text-sm">599 €</p>
      <p class="text-sm text-gray-600">3 colors</p>
      <div class="flex justify-end mt-2">
        <button class="text-xl">🛒</button>
      </div>
      </div>
    </a>
    </div>
    <!-- Paginator-->
    <div class="w-full h-10">
    <nav class="w-full h-full">
      <ul class="w-full h-full flex gap-2 items-center justify-center px-10 font-bold">
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
  </main>
@endsection