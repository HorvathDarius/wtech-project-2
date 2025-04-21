<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stringshop</title>
    @vite('resources/css/app.css')
</head>

<body class="w-screen h-screen flex flex-col">
    <!-- HEADER -->
    @include('layout.header')

    <!-- MAIN CONTAINER -->
    <main class="w-full h-full overflow-scroll">
        @yield('content')
    </main>
    <!-- FOOTER -->
    @include('layout.footer')
</body>

</html>