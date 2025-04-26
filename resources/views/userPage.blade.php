@extends('layout.app')
@section('content')
  <div
    class="grid w-full absolute top-20 p-4 pb-14 grid-cols-1 grid-rows-10 sm:grid-rows-5 sm:grid-cols-4 lg:grid-cols-5 lg:grid-rows-2 gap-4">
    <!-- LEFT CONTAINER -->
    <div
    class="row-span-1 col-span-1 row-start-1 col-start-1 sm:row-span-1 sm:col-span-4 sm:row-start-1 sm:col-start-1 lg:row-span-1 lg:col-span-1 bg-outline rounded-md">
    <article class="w-full h-full flex flex-col justify-around items-center font-bold">
      <a href="{{ route('userPage', ['id' => Auth::user()->id]) }}" class="text-primary">Account</a>
      <a href="{{ route('orderHistory') }}">Order History</a>
      <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button class="bg-primary text-white h-10 w-40 px-10 rounded-md cursor-pointer" type="submit">
        Log out
      </button>
      </form>
    </article>
    </div>

    <!-- RIGHT CONTAINER -->
    <!-- TOP LEFT INNER CONTIANER -->
    <div
    class="row-span-2 col-span-1 row-start-2 col-start-1 sm:col-span-2 sm:row-span-2 sm:row-start-2 sm:col-start-1 lg:row-span-1 lg:row-start-1 lg:col-start-2 rounded-md border-1 border-outline flex flex-col">
    <div class="bg-primary w-full h-10 rounded-t-md flex justify-center items-center text-white font-bold">
      Account Information
    </div>
    <form action="/edit-account-information" method="post"
      class="w-full h-full flex flex-col items-center justify-center">
      <div class="w-full h-full flex justify-center items-center">
      <table class="table-auto w-full h-full p-6 m-8">
        <tbody>
        <tr>
          <td class="font-bold">Name:</td>
          <td>
          <input type="text" name="userName" value="{{ $user->name }}"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">E-mail:</td>
          <td>
          <input type="email" name="userEmail" value="{{ $user->email }}"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">Phone:</td>
          <td>
          <input type="tel" name="userPhone" value="{{ $user->phone_number }}"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        </tbody>
      </table>
      </div>
      <button type="submit" class="bg-primary text-white h-10 w-40 px-10 rounded-md m-4 cursor-pointer">
      Edit Profile
      </button>
    </form>
    </div>

    <!-- TOP RIGHT INNER CONTAINER -->
    <div
    class="row-span-3 col-span-1 row-start-4 col-start-1 sm:col-span-2 sm:row-span-2 sm:row-start-2 sm:col-start-3 lg:row-span-1 lg:row-start-1 lg:col-start-4 rounded-md border-1 border-outline flex flex-col">
    <div class="bg-primary w-full h-10 rounded-t-md flex justify-center items-center text-white font-bold">
      Shipping Information
    </div>
    <form action="/edit-shipping-information" method="post"
      class="w-full h-full flex flex-col items-center justify-center">
      <div class="w-full h-full flex justify-center items-center">
      <table class="table-auto w-full h-full p-6 m-8">
        <tbody>
        <tr>
          <td class="font-bold">Address:</td>
          <td>
          <input type="text" name="shippingAddress" value="{{ $user->address }}"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">Country:</td>
          <td>
          <input type="text" name="shippingCountry" value="{{ $user->country }}"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">Region:</td>
          <td>
          <input type="text" name="shippingRegion" value="{{ $user->region }}"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">City:</td>
          <td>
          <input type="text" name="shippingCity" value="{{ $user->city }}"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">Zip Code:</td>
          <td>
          <input type="text" name="shippingZipCode" value="{{ $user->zip_code }}"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        </tbody>
      </table>
      </div>
      <button type="submit" class="bg-primary text-white h-10 px-10 rounded-md m-4 cursor-pointer">
      Edit Shipping Information
      </button>
    </form>
    </div>

    <!-- BOTTOM LEFT INNER CONTAINER -->
    <div
    class="row-span-2 col-span-1 row-start-7 col-start-1 sm:col-span-2 sm:row-span-2 sm:row-start-4 sm:col-start-1 lg:row-span-1 lg:row-start-2 lg:col-start-2 rounded-md border-1 border-outline flex flex-col">
    <div class="bg-primary w-full h-10 rounded-t-md flex justify-center items-center text-white font-bold">
      Payment Information
    </div>
    @if ($paymentInfo == null)
    <div class="w-full h-full flex flex-col items-center justify-center">
      <p class="text-center">No payment information available.</p>
      <p class="text-primary font-bold">You need to place an order in order to see your payment information.</p>
    </div>
  @else
  <form action="/edit-payment-information" method="post"
    class="w-full h-full flex flex-col items-center justify-center">
    <div class="w-full h-full flex justify-center items-center">
    <table class="w-full h-full p-6 m-8">
    <tbody>
    <tr>
      <td class="font-bold">Card Number:</td>
      <td>
      <input type="string" name="paymentCardNumber" value="{{ $paymentInfo->card_number }}"
      class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
      </td>
    </tr>
    <tr>
      <td class="font-bold">Name on Card:</td>
      <td>
      <input type="text" name="paymentNameOnCard" value="{{ $paymentInfo->name_on_card }}"
      class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
      </td>
    </tr>
    </tbody>
    </table>
    </div>
    <div class="flex items-center justify-between">
    <button type="submit" class="bg-primary text-white h-10 px-10 rounded-md m-4 cursor-pointer">Edit</button>
    <button class="bg-primary text-white h-10 px-10 rounded-md m-4 cursor-pointer">Delete</button>
    </div>
  </form>
@endif
    </div>

    <!-- BOTTOM RIGHT INNER CONTAINER -->
    <div
    class="row-span-2 col-span-1 row-start-9 col-start-1 sm:col-span-2 sm:row-span-2 sm:row-start-4 sm:col-start-3 lg:row-span-1 lg:row-start-2 lg:col-start-4 rounded-md border-1 border-outline flex flex-col">
    <div class="bg-primary w-full h-10 rounded-t-md flex justify-center items-center text-white font-bold">
      Recent Orders
    </div>
    <div class="w-full h-full flex flex-col items-center justify-center">
      <div class="w-full h-full">
      <table class="w-full">
        <thead class="h-10">
        <tr>
          <th>Order #</th>
          <th>Order Summary</th>
          <th>Order Status</th>
        </tr>
        </thead>
        <tbody class="text-center">

        @foreach ($orders as $order)
      <tr class="border border-outline h-10">
        <td>{{ $order->id }}</td>
        <td>1x Guitar, 2x Amps</td>
        <td>
        @if ($order->order_status == 'delivered')
      <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
      Delivered
      </span>
    @elseif ($order->order_status == 'preparing')
    <span class="bg-orange-200 px-4 py-1 border border-orange-600 rounded-lg text-orange-500">
    Preparing
    </span>
  @else
  <span class="bg-red-200 px-4 py-1 border border-red-600 rounded-lg text-red-600">
  Cancelled
  </span>
@endif
        </td>
      </tr>
    @endforeach

        </tbody>
      </table>
      </div>
      <a href="{{ route('orderHistory') }}">
      <button class="bg-primary text-white h-10 px-10 rounded-md mb-4 cursor-pointer">View all Orders</button>
      </a>
    </div>
    </div>
  </div>
@endsection