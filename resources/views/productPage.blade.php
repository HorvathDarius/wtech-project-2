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
    <h2 class="text-xl font-semibold">Product Name</h2>

    <!-- Color selection -->
    <div class="border rounded p-3 mb-4">
      <p class="font-semibold mb-1">Color:</p>
      <div class="space-y-1 accent-primary">
      <label class="flex items-center space-x-2">
        <input type="radio" name="color" checked class="text-primary" />
        <span class="text-primary font-medium">Crimson red</span>
      </label>
      <label class="flex items-center space-x-2">
        <input type="radio" name="color" class="text-blue-600" />
        <span class="text-blue-600">Blueish blue</span>
      </label>
      <label class="flex items-center space-x-2">
        <input type="radio" name="color" class="text-black" />
        <span class="text-black">Pitch black</span>
      </label>
      </div>
    </div>

    <!-- Price and stock -->
    <div class="mb-2">
      <p class="text-sm text-green-600">In stock</p>
      <p class="text-primary font-bold text-xl">600 €</p>
    </div>

    <!-- Quantity & Button -->
    <div class="flex items-center space-x-4">
      <input type="number" value="1" min="1" max="100" step="1" class="border rounded p-1" />
      <a href="{{ route('cart') }}">
      <button class="bg-primary hover:bg-primary text-white px-4 py-2 rounded">Add to Cart</button>
      </a>
    </div>
    </div>

    <!-- Full-width description -->
    <div class="md:col-span-2 border-t pt-4 mt-6">
    <h3 class="font-semibold mb-2 text-gray-700">Description:</h3>
    <p class="w-full border rounded p-2 mb-4" rows="4" placeholder="Product details here...">
      The guitar is a fretted, stringed musical instrument typically made of wood, with six strings stretched over a
      flat or slightly curved body. It consists of three main parts: the body, which amplifies the sound; the neck,
      which houses the fingerboard or fretboard; and the headstock, which contains the tuning pegs. Guitars can be
      acoustic, which use a hollow body to naturally amplify sound, or electric, which rely on pickups and
      electronic amplification. The strings are usually tuned to the notes E-A-D-G-B-E (from lowest to highest
      pitch), though variations exist. Commonly used in genres like rock, blues, classical, jazz, and folk, the
      guitar is a versatile instrument played by strumming, plucking, or fingerpicking.
    </p>
    </div>
  </main>
@endsection
