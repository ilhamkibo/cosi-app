{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cosi | {{ $title ?? 'Eco Living' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href={{ asset('images/logo-tab.png') }} type="image/x-icon">
    <!-- Styles / Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])


<body class="font-sora antialiased dark:bg-black dark:text-white/50 bg-gray-75"
    data-page="{{ Route::currentRouteName() }}">
    @if (url()->current() === url('/'))
        <header class="h-screen bg-black overflow-hidden relative"
            style="background-image: url('/images/hero.png'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 z-0 bg-black opacity-50"></div> <!-- Black overlay -->
            <div class="relative">
                <div class="fixed left-0 right-0 top-5 w-full flex justify-center">
                    <img class="w-32 logo" src="{{ asset('images/logo-white.png') }}" alt="Logo">
                </div>
            </div>
            <div class="absolute inset-0 flex justify-center items-center">
                <img src="{{ asset('images/spinning-white.png') }}" alt="spinning white"
                    class="animate-spin-slow spinner w-[250px] md:w-[400px] object-contain">
            </div>

        </header>
    @endif
    <main>
        @include('components.layouts.navbar')
        <div class="-mt-[3.5rem]">
            {{ $slot }}
        </div>
    </main>


</body>

</html> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cosi | {{ $title ?? 'Eco Living' }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href={{ asset('images/logo-tab2.png') }} type="image/x-icon">
    <!-- Styles / Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sora antialiased dark:bg-black dark:text-white/50 bg-gray-75"
    data-page="{{ Route::currentRouteName() }}">
    @if (url()->current() === url('/'))
        <header class="h-screen bg-black overflow-hidden relative"
            style="background-image: url('/images/hero.png'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 z-0 bg-black opacity-50"></div> <!-- Black overlay -->
            <div class="relative">
                <div class="fixed left-0 right-0 top-5 w-full flex justify-center logo-container">
                    <img class="w-32 logo" src="{{ asset('images/logo-white.png') }}" alt="Logo">
                </div>
            </div>
            <div class="absolute inset-0 flex justify-center items-center">
                <img src="{{ asset('images/spinning-white.png') }}" alt="spinning white"
                    class="animate-spin-slow spinner w-[250px] md:w-[400px] object-contain">
            </div>
        </header>
    @endif

    <main>
        @include('components.layouts.navbar')
        <div class="-mt-[3.5rem]">
            {{ $slot }}
        </div>
    </main>

</body>

</html>
