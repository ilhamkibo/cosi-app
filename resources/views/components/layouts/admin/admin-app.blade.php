<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cosi | {{ $title ?? 'Recycled Goods' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href={{ asset('images/logo-tab.png') }} type="image/x-icon">
    <!-- Styles / Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])


<body class="font-sora antialiased dark:bg-black dark:text-white/50 bg-gray-75"
    data-page="{{ Route::currentRouteName() }}">
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <!-- Navbar -->
        @include('components.layouts.admin.admin-navbar')

        <!-- Sidebar -->
        @include('components.layouts.admin.admin-sidebar')



        <main class="p-4 md:ml-64 h-auto pt-20">
            {{ $slot }}
        </main>
    </div>

</body>

</html>
