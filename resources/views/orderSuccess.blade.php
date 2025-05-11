@extends('layout.app')
@section('content')
    <div class="w-full h-full flex items-center justify-center">
        <div
            class="border border-outline rounded-md w-auto h-auto flex flex-col items-center justify-center gap-4 p-4 sm:p-10">
            <svg width="140px" height="140px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg"
                stroke="#37ff00" class="my-10">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <circle cx="12" cy="12" r="10" stroke="#37b82e" stroke-width="1.5"></circle>
                    <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="#37b82e" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </g>
            </svg>
            <p class="text-xl font-bold text-primary">Order {{ $order->id }} was placed successfully</p>
            <p class="text-lg">Your order will be delivered soon!</p>
            <div class="flex flex-col gap-4">
                @auth
                    <a href="{{ route('order.show', ['id' => $order->id]) }}">
                        <button class="bg-primary text-white h-10 w-60 px-10 rounded-md cursor-pointer">See Order</button>
                    </a>
                @endauth
                <a href="{{ route('dashboard') }}">
                    <button class="text-white bg-primary h-10 w-60 px-10 rounded-md cursor-pointer">Continue
                        Shopping</button>
                </a>
            </div>
        </div>
    </div>
@endsection
