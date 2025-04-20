@extends('layout.app')
@section('content')
  <div
    class="grid w-full absolute top-20 p-4 pb-14 grid-cols-1 grid-rows-10 sm:grid-rows-5 sm:grid-cols-4 lg:grid-cols-5 lg:grid-rows-2 gap-4">
    <!-- LEFT CONTAINER -->
    <div
    class="row-span-1 col-span-1 row-start-1 col-start-1 sm:row-span-1 sm:col-span-4 sm:row-start-1 sm:col-start-1 lg:row-span-1 lg:col-span-1 bg-outline rounded-md">
    <article class="w-full h-full flex flex-col justify-around items-center font-bold">
      <a href="userPage.html" class="text-primary">Account</a>
      <a href="orderHistoryPage.html">Order History</a>
      <a href="login.html">
      <button class="bg-primary text-white h-10 w-40 px-10 rounded-md cursor-pointer">Log Out</button>
      </a>
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
          <input type="text" name="userName" value="John Doe"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">E-mail:</td>
          <td>
          <input type="email" name="userEmail" value="john@test.com"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">Phone:</td>
          <td>
          <input type="tel" name="userPhone" value="123-456-7890"
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
          <input type="text" name="shippingAddress" value="Yellow Street 123"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">Country:</td>
          <td>
          <input type="text" name="shippingCountry" value="Slovakia"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">Region:</td>
          <td>
          <input type="text" name="shippingRegion" value="Bratislava"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">City:</td>
          <td>
          <input type="text" name="shippingCity" value="Bratislava"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">Zip Code:</td>
          <td>
          <input type="text" name="shippingZipCode" value="123 45"
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
    <form action="/edit-payment-information" method="post"
      class="w-full h-full flex flex-col items-center justify-center">
      <div class="w-full h-full flex justify-center items-center">
      <table class="w-full h-full p-6 m-8">
        <tbody>
        <tr>
          <td class="font-bold">Card Number:</td>
          <td>
          <input type="number" name="paymentCardNumber" value="1234123412341234"
            class="bg-stone-200 border border-outline w-full rounded-md px-4" disabled />
          </td>
        </tr>
        <tr>
          <td class="font-bold">Name on Card:</td>
          <td>
          <input type="text" name="paymentNameOnCard" value="John Doe"
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
        <tr class="border border-outline h-10">
          <td>12345</td>
          <td>1x Guitar, 2x Amps</td>
          <td>
          <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
            Delivered
          </span>
          </td>
        </tr>
        <tr class="border border-outline h-10">
          <td>12345</td>
          <td>1x Guitar, 2x Amps</td>
          <td>
          <span class="bg-orange-200 px-4 py-1 border border-orange-600 rounded-lg text-orange-500">
            Preparing
          </span>
          </td>
        </tr>
        <tr class="border border-outline h-10">
          <td>12345</td>
          <td>1x Guitar, 2x Amps</td>
          <td>
          <span class="bg-red-200 px-4 py-1 border border-red-600 rounded-lg text-red-600">
            Cancelled
          </span>
          </td>
        </tr>
        <tr class="border border-outline h-10">
          <td>12345</td>
          <td>1x Guitar, 2x Amps</td>
          <td>
          <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
            Delivered
          </span>
          </td>
        </tr>
        </tbody>
      </table>
      </div>
      <a href="orderHistoryPage.html">
      <button class="bg-primary text-white h-10 px-10 rounded-md mb-4 cursor-pointer">View all Orders</button>
      </a>
    </div>
    </div>
  </div>
@endsection