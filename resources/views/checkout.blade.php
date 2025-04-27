@extends('layout.app')

@section('content')
  <main class="w-full h-full overflow-scroll lg:pb-14">
    <div class="w-full h-10 flex justify-center items-center text-primary font-bold text-xl">Checkout</div>
    <form action="{{ route('order.store') }}" method="POST" {{-- <form action="/random" method="POST" --}}
    class="grid grid-cols-1 grid-rows-6 sm:grid-cols-1 sm:grid-rows-2 lg:grid-cols-3 lg:grid-rows-1 gap-4 px-4">
    @csrf
    <!-- LEFT CONTAINER -->
    <div
      class="row-span-4 col-span-1 row-start-1 col-start-1 sm:row-span-1 sm:col-span-1 sm:row-start-1 sm:col-start-1 lg:row-span-1 lg:col-span-2 lg:row-start-1 lg:col-start-1 border border-outline rounded-lg p-4">
      <div class="w-full h-10 flex justify-center items-center">
      <span class="text-lg font-bold"> Billing Information </span>
      </div>

      <!-- FORM FIELDS -->
      <div class="grid grid-rows-18 grid-cols-1 md:grid-rows-10 md:grid-cols-2">
      <!-- FIRST NAME -->
      <div
        class="p-2 row-span-1 col-span-1 row-start-1 col-start-1 md:row-span-1 md:col-span-1 md:row-start-1 md:col-start-1">
        <label for="firstName">First Name <span class="text-red-600">*</span></label>
        <input id="firstName" name="firstName" type="text" value={{ explode(' ', $user->name, 2)[0] ?? '' }}
        class="w-full h-8 bg-gray-200 rounded-sm" required />
      </div>
      <!-- LAST NAME -->
      <div
        class="p-2 row-span-1 col-span-1 row-start-2 col-start-1 md:row-span-1 md:col-span-1 md:row-start-1 md:col-start-2">
        <label for="lastName">Last Name <span class="text-red-600">*</span></label>
        <input id="lastName" name="lastName" type="text" value={{ explode(' ', $user->name, 2)[1] }}
        class="w-full h-8 bg-gray-200 rounded-sm" required />
      </div>
      <!-- EMAIL -->
      <div
        class="p-2 row-span-1 col-span-1 row-start-3 col-start-1 md:row-span-1 md:col-span-1 md:row-start-2 md:col-start-1">
        <label for="email">E-mail <span class="text-red-600">*</span></label>
        <input id="email" name="email" type="email" value="{{ $user->email }}"
        class="w-full h-8 bg-gray-200 rounded-sm" required />
      </div>
      <!-- PHONE NUMBER -->
      <div
        class="p-2 row-span-1 col-span-1 row-start-4 col-start-1 md:row-span-1 md:col-span-1 md:row-start-2 md:col-start-2">
        <label for="phone-number">Phone Number <span class="text-red-600">*</span></label>
        <input id="phone-number" name="phone-number" type="text" value="{{ $user->phone_number }}"
        class="w-full h-8 bg-gray-200 rounded-sm" required />
      </div>
      <!-- ADDRESS -->
      <div
        class="p-2 row-span-1 col-span-1 row-start-5 col-start-1 md:row-span-1 md:col-span-2 md:row-start-3 md:col-start-1">
        <label for="address">Address <span class="text-red-600">*</span></label>
        <input id="address" name="address" type="text" value="{{ $user->address }}"
        class="w-full h-8 bg-gray-200 rounded-sm" required />
      </div>
      <!-- COUNTRY -->
      <div
        class="p-2 row-span-1 col-span-1 row-start-6 col-start-1 md:row-span-1 md:col-span-1 md:row-start-4 md:col-start-1">
        <label for="country">Country <span class="text-red-600">*</span></label>
        <input id="country" name="country" type="text" value="{{ $user->country }}"
        class="w-full h-8 bg-gray-200 rounded-sm" required />
      </div>
      <!-- REGION -->
      <div
        class="p-2 row-span-1 col-span-1 row-start-7 col-start-1 md:row-span-1 md:col-span-1 md:row-start-4 md:col-start-2">
        <label for="region">Region <span class="text-red-600">*</span></label>
        <input id="region" name="region" type="text" value="{{ $user->region }}"
        class="w-full h-8 bg-gray-200 rounded-sm" required />
      </div>
      <!-- CITY -->
      <div
        class="p-2 row-span-1 col-span-1 row-start-8 col-start-1 md:row-span-1 md:col-span-1 md:row-start-5 md:col-start-1">
        <label for="city">City <span class="text-red-600">*</span></label>
        <input id="city" name="city" type="text" value="{{ $user->city }}" class="w-full h-8 bg-gray-200 rounded-sm"
        required />
      </div>
      <!-- ZIP CODE -->
      <div
        class="p-2 row-span-1 col-span-1 row-start-9 col-start-1 md:row-span-1 md:col-span-1 md:row-start-5 md:col-start-2">
        <label for="zip_code">Zip Code <span class="text-red-600">*</span></label>
        <input id="zip_code" name="zip_code" type="text" value="{{ $user->zip_code }}"
        class="w-full h-8 bg-gray-200 rounded-sm" required />
      </div>
      <!-- DELIVERY CHECKBOXES -->
      <div
        class="px-4 flex flex-col items-center justify-center row-span-2 col-span-1 row-start-10 col-start-1 md:row-span-2 md:col-span-2 md:row-start-6 md:col-start-1">
        <label for="colors">Delivery Options <span class="text-red-600">*</span></label>
        <div class="w-full flex flex-col md:flex-row justify-between py-2" id="colors">
        <div class="flex justify-center items-center gap-4">
          <input id="standard-delivery" value="standard-delivery" name="delivery" type="radio"
          class="h-6 w-6 accent-primary rounded-sm px-2" />
          <label for="standard-delivery">
          <p>Standard Delivery</p>
          <p class="font-light">(5-7 days)</p>
          <p class="text-xs font-light">(additional charges)</p>
          </label>
        </div>
        <div class="flex justify-center items-center gap-4">
          <input id="express-delivery" value="express-delivery" name="delivery" type="radio"
          class="h-6 w-6 accent-primary rounded-sm" />
          <label for="express">
          Express Delivery
          <p class="font-light">(1-3 days)</p>
          <p class="text-xs font-light">(additional charges)</p>
          </label>
        </div>
        <div class="flex justify-center items-center gap-4">
          <input id="pickup" value="pickup" name="delivery" type="radio"
          class="h-6 w-6 accent-primary rounded-sm" />
          <label for="pickup">
          Pickup at our Store
          <p class="font-light">(no charges)</p>
          </label>
        </div>
        </div>
      </div>
      <!-- PAYMENT OPTIONS -->
      <div
        class="p-2 row-span-1 col-span-1 row-start-16 col-start-1 md:row-span-1 md:col-span-1 md:row-start-8 md:col-start-1 flex items-center">
        <button class="w-full rounded-lg cursor-pointer flex justify-center">
        <img src="/images/googlePayPaymentOption.png" alt="googlePayPaymentOption" class="w-80 rounded-sm" />
        </button>
      </div>
      <div
        class="p-2 row-span-1 col-span-1 row-start-12 col-start-1 md:row-span-1 md:col-span-1 md:row-start-8 md:col-start-2">
        <label for="card-name">Name on Card <span class="text-red-600">*</span></label>
        <input id="card-name" name="card-name" type="text" value="{{ $paymentInfo->name_on_card }}"
        class="w-full h-8 bg-gray-200 rounded-sm" required />
      </div>
      <div
        class="p-2 row-span-1 col-span-1 row-start-17 col-start-1 md:row-span-1 md:col-span-1 md:row-start-9 md:col-start-1 flex items-center">
        <button class="w-full rounded-sm cursor-pointer flex justify-center">
        <img src="/images/applePayPaymentOption.png" alt="applePayPaymentOption" class="w-80 rounded-lg" />
        </button>
      </div>
      <div
        class="p-2 row-span-1 col-span-1 row-start-13 col-start-1 md:row-span-1 md:col-span-1 md:row-start-9 md:col-start-2">
        <label for="card-number">Card Number <span class="text-red-600">*</span></label>
        <input id="card-number" name="card-number" type="text" value="{{ $paymentInfo->card_number }}"
        class="w-full h-8 bg-gray-200 rounded-sm" required />
      </div>
      <div
        class="p-2 row-span-1 col-span-1 row-start-18 col-start-1 md:row-span-1 md:col-span-1 md:row-start-10 md:col-start-1 flex items-center">
        <button class="w-full cursor-pointer flex justify-center">
        <img src="/images/paypalPaymentOption.png" alt="paypalPaymentOption" class="w-80" />
        </button>
      </div>
      <div
        class="w-full p-2 flex flex-col md:flex-row items-center justify-around row-span-2 col-span-1 row-start-14 col-start-1 md:row-span-1 md:col-span-1 md:row-start-10 md:col-start-2">
        <div class="flex flex-col items-center px-2">
        <label for="expireDate">Expire Date <span class="text-red-600">*</span></label>
        <input id="expireDate" name="expireDate" type="text" class="h-8 bg-gray-200 w-full rounded-sm" required />
        </div>
        <div class="flex flex-col items-center px-2">
        <label for="cardCvc">CVC <span class="text-red-600">*</span></label>
        <input id="cardCvc" name="cardCvc" type="text" class="h-8 bg-gray-200 w-full rounded-sm" required />
        </div>
      </div>
      </div>
    </div>

    <!-- RIGHT CONTAINER  -->
    <div
      class="row-span-2 col-span-1 row-start-5 col-start-1 sm:row-span-1 sm:col-span-1 sm:row-start-2 sm:col-start-1 lg:row-span-1 lg:col-span-1 lg:row-start-1 lg:col-start-3 border border-primary rounded-md p-4">
      <div class="w-full h-10 flex justify-center items-center">
      <span class="text-lg font-bold">Order Summary</span>
      </div>
      <!-- SCROLL CONTAINER -->
      <div class="flex flex-col h-120 w-full gap-4 overflow-scroll">
      @foreach ($products as $product)
      <div class="w-full flex items-center gap-4">
      <img src="/images/guitar/guitar_placeholder.webp" alt="guitarPlaceholder" class="w-40 h-40" />
      <div class="flex flex-col gap-2">
      <p class="text-lg font-bold">{{ $product->product->product_visible_name }}</p>
      <article class="text-md font-light">
        <span>Qty: </span>
        <span>{{ $product->quantity }} x</span>
        <span class="font-bold text-primary">{{ $product->product->product_price }} €</span>
      </article>
      </div>
      </div>
    @endforeach

      </div>

      <!-- ORDER SUMMARY -->
      <div class="w-full h-40 p-4">
      <table class="table-fixed w-full h-full text-lg">
        <tbody>
        <tr>
          <td class="w-2/3 md:w-3/4">Sub-total:</td>
          <td class="w-1/3 md:w-1/4 text-primary">{{ $totalPrice }} €</td>
        </tr>
        <tr>
          <td>Shipping:</td>
          <td class="text-primary">30 €</td>
        </tr>
        <tr class="border-t-4 border-primary text-xl font-bold">
          <td>Total:</td>
          <td class="text-primary">
          <input type="hidden" name="totalPrice" value="{{ $totalPrice + 30 }}" />
          2580 €
          </td>
        </tr>
        </tbody>
      </table>
      </div>
      <!-- PLACE ORDER BUTTON -->
      <div class="w-full h-20 flex flex-col gap-4 justify-center items-center">
      <a href="{{ route('orderSuccess') }}" class="w-full">
        <button type="submit" class="bg-primary text-white h-10 w-full px-10 rounded-md cursor-pointer">
        Place Order
        </button>
      </a>
      </div>
    </div>
    </form>
  @endsection