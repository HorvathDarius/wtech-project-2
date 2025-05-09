<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Stringshop</title>
    @vite('resources/css/app.css')
</head>

<body class="w-screen h-screen flex flex-col">
    <!-- HEADER -->
    @include('layout.header')

    <!-- MAIN CONTAINER -->
    <main class="w-full h-full overflow-scroll">
        @if (session('error'))
            <div class="w-ull h-10 bg-red-500 text-white flex items-center justify-center">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
    <!-- FOOTER -->
    @include('layout.footer')
</body>

</html>