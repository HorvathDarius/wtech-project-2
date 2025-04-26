@extends('layout.app')
@section('content')
  <div
    class="grid w-full absolute left-0 top-24 gap-4 pb-14 grid-rows-4 grid-cols-1 sm:grid-rows-2 sm:grid-cols-4 lg:grid-cols-5">
    <!-- LEFT CONTAINER -->
    <div
    class="row-span-1 col-span-1 sm:row-span-1 sm:col-span-1 sm:row-start-1 sm:col-start-1 lg:row-span-1 lg:col-span-1 bg-outline rounded-md m-4">
    <article class="w-full h-full flex flex-col justify-around items-center font-bold">
      <a href="{{ route('userPage', ['id' => Auth::user()->id]) }}">Account</a>
      <a href="{{ route('orderHistory') }}" class="text-primary">Order History</a>
      <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button class="bg-primary text-white h-10 w-40 px-10 rounded-md cursor-pointer" type="submit">
        Log out
      </button>
      </form>
    </article>
    </div>

    <!-- RIGHT CONTAINER -->
    <div
    class="row-span-3 col-span-1 row-start-2 sm:col-span-3 sm:row-span-2 sm:row-start-1 sm:col-start-2 lg:row-span-2 lg:row-start-1 lg:col-start-2 lg:col-span-4 rounded-md border-1 border-outline flex flex-col">
    <p class="w-full text-xl px-8 py-2 font-bold text-[#DC443C]">Order History</p>

    <!-- ORDER LIST -->
    <div class="h-full center border border-outline rounded-md sm:m-4 mt-0 relative">
      <table class="w-full">
      <thead>
        <tr class="h-10 bg-primary text-white rounded-2xl">
        <th class="rounded-tl-lg">Order #</th>
        <th>Order Summary</th>
        <th>Order Date</th>
        <th>Order Status</th>
        <th class="rounded-tr-lg">Action</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <!-- ONE ORDER  -->
        <tr class="border border-outline h-12">
        <td>12345</td>
        <td class="px-4">1x Guitar, 2x Amps</td>
        <td>10.10.2025</td>
        <td>
          <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
          Delivered
          </span>
        </td>
        <td class="text-primary">
          <a href="{{ route('orderPage') }}">View Order</a>
        </td>
        </tr>

        <!-- ONE ORDER  -->
        <tr class="border border-outline h-12">
        <td>12345</td>
        <td class="px-4">1x Guitar, 2x Amps</td>
        <td>10.10.2025</td>
        <td>
          <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
          Delivered
          </span>
        </td>
        <td class="text-primary">
          <a href="{{ route('orderPage') }}">View Order</a>
        </td>
        </tr>

        <!-- ONE ORDER  -->
        <tr class="border border-outline h-12">
        <td>12345</td>
        <td class="px-4">1x Guitar, 2x Amps</td>
        <td>10.10.2025</td>
        <td>
          <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
          Delivered
          </span>
        </td>
        <td class="text-primary">
          <a href="{{ route('orderPage') }}">View Order</a>
        </td>
        </tr>

        <!-- ONE ORDER  -->
        <tr class="border border-outline h-12">
        <td>12345</td>
        <td class="px-4">1x Guitar, 2x Amps</td>
        <td>10.10.2025</td>
        <td>
          <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
          Delivered
          </span>
        </td>
        <td class="text-primary">
          <a href="{{ route('orderPage') }}">View Order</a>
        </td>
        </tr>

        <!-- ONE ORDER  -->
        <tr class="border border-outline h-12">
        <td>12345</td>
        <td class="px-4">1x Guitar, 2x Amps</td>
        <td>10.10.2025</td>
        <td>
          <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
          Delivered
          </span>
        </td>
        <td class="text-primary">
          <a href="{{ route('orderPage') }}">View Order</a>
        </td>
        </tr>

        <!-- ONE ORDER  -->
        <tr class="border border-outline h-12">
        <td>12345</td>
        <td class="px-4">1x Guitar, 2x Amps</td>
        <td>10.10.2025</td>
        <td>
          <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
          Delivered
          </span>
        </td>
        <td class="text-primary">
          <a href="{{ route('orderPage') }}">View Order</a>
        </td>
        </tr>

        <!-- ONE ORDER  -->
        <tr class="border border-outline h-12">
        <td>12345</td>
        <td class="px-4">1x Guitar, 2x Amps</td>
        <td>10.10.2025</td>
        <td>
          <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
          Delivered
          </span>
        </td>
        <td class="text-primary">
          <a href="{{ route('orderPage') }}">View Order</a>
        </td>
        </tr>

        <!-- ONE ORDER  -->
        <tr class="border border-outline h-12">
        <td>12345</td>
        <td class="px-4">1x Guitar, 2x Amps</td>
        <td>10.10.2025</td>
        <td>
          <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
          Delivered
          </span>
        </td>
        <td class="text-primary">
          <a href="{{ route('orderPage') }}">View Order</a>
        </td>
        </tr>

        <!-- ONE ORDER  -->
        <tr class="border border-outline h-12">
        <td>12345</td>
        <td class="px-4">1x Guitar, 2x Amps</td>
        <td>10.10.2025</td>
        <td>
          <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
          Delivered
          </span>
        </td>
        <td class="text-primary">
          <a href="{{ route('orderPage') }}">View Order</a>
        </td>
        </tr>

        <!-- ONE ORDER  -->
        <tr class="border border-outline h-12">
        <td>12345</td>
        <td class="px-4">1x Guitar, 2x Amps</td>
        <td>10.10.2025</td>
        <td>
          <span class="bg-green-200 px-4 py-1 border border-green-600 rounded-lg text-green-600">
          Delivered
          </span>
        </td>
        <td class="text-primary">
          <a href="{{ route('orderPage') }}">View Order</a>
        </td>
        </tr>
      </tbody>
      </table>

      <!-- PAGINATOR -->
      <div class="w-full h-10 flex justify-center">
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