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

<body class="font-sora antialiased dark:bg-black dark:text-white/50 bg-blue-75/50"
    data-page="{{ Route::currentRouteName() }}">

    <div class="flex justify-center flex-col items-center mt-24">
        <a href="{{ route('home') }}"><img src="{{ asset('images/logo-white.png') }}" alt="Logo"></a>
        <h1 class="text-white font-extralight font-fraunces mt-2">#RecycledGoodsforEveryone</h1>
    </div>

    <div class="flex justify-center flex-col items-center">
        <h1 class="text-center text-2xl font-semibold text-white my-10">Please verify your email through the email we've
            sent
            you.</h1>

        <p class="text-center text-white font-extralight text-sm">If you didn't receive the email or the email is
            invalid, we will gladly send
            you another by contacting the admin.</p>
        {{-- <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button
                class="px-2.5 bg-green-75/80 hover:bg-green-75 text-white text-sm font-medium py-2 rounded-lg">Resend
                Verification Email</button>
        </form> --}}
        <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
            @csrf
            <button type="submit"
                class="block w-full rounded-lg text-left py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Sign out
            </button>
        </form>
    </div>

</body>

</html>
