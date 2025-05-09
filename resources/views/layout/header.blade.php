<header>
    <nav class="bg-outline h-20 flex items-center font-bold px-4 sm:px-10 justify-between">
        <div class="flex sm:gap-6 items-center">
            <div class="w-20 h-20">
                <a href="{{ route('dashboard') }}" class="cursor-pointer">
                    <img src="{{ asset('/images/Logo.png') }}" alt="StringShop logo" />
                </a>
            </div>
            <a href="{{ route('products.category', ['category' => 'guitar']) }}">Guitars</a>
            <a href="{{ route('products.category', ['category' => 'bass']) }}">Basses</a>
            <a href="{{ route('products.category', ['category' => 'amp']) }}">Amps</a>
        </div>

        <div class="flex gap-4 sm:gap-10">
            <!-- LOGGED USER -->
            @auth
                @if (Auth::user()->user_role == 'admin')
                    <a href="{{ route('adminPage') }}">
                    @else
                        <a href="{{ route('userPage', ['id' => Auth::user()->id]) }}">
                @endif
                {{ Auth::user()->name }}
                </a>
            @endauth

            <!-- GUEST USER -->
            @guest
                <a href="{{ route('login') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </a>
            @endguest

            <a href="{{ route('cart.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </a>
        </div>
    </nav>
</header>
