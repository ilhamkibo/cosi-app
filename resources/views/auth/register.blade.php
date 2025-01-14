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

<body class="font-sora antialiased dark:bg-black dark:text-white/50 bg-blue-75/50">

    <div class="flex justify-center flex-col items-center mt-24">
        <a href="{{ route('home') }}"><img src="{{ asset('images/logo-white.png') }}" alt="Logo"></a>
        <h1 class="text-white font-extralight font-fraunces mt-2">#RecycledGoodsforEveryone</h1>
    </div>

    <main class="flex justify-center items-center mx-4 xl:mx-0">
        <div class="relative bg-white w-full max-w-md rounded-lg shadow-lg overflow-hidden mt-10 mb-12">
            <!-- Overlay Gelap -->
            {{-- <div class="absolute inset-0 bg-black bg-opacity-50"></div> --}}

            <!-- Form Login -->
            <div class="relative p-8 z-10">
                <h1 class="text-center text-2xl font-semibold text-green-75">Welcome back!</h1>
                <p class="text-center text-green-75 font-extralight text-sm mb-10">Please enter your details to sign in
                </p>
                <div class="grid grid-cols-1">
                    <a href="#"
                        class="shadow shadow-gray-300 p-1 flex items-center justify-center rounded-lg text-center gap-4 h-16 hover:bg-green-75/30">
                        <img src="{{ asset('images/login/google.png') }}" alt="" class="object-contain h-5">
                        <h1 class="text-sm text-gray-600">Sign in with Google</h1>
                    </a>
                    {{-- <a href="#"
                        class="shadow shadow-gray-300 p-2 rounded-lg text-center h-16 hover:bg-blue-75/30">
                        <img src="{{ asset('images/login/github.png') }}" alt=""
                            class="object-contain h-full w-full">
                    </a> --}}
                </div>
                <div class="inline-flex items-center justify-center w-full">
                    <hr class="w-full h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <span
                        class="absolute text-sm text-center px-3 font-medium text-gray-500 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">or
                        sign in with email</span>
                </div>
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <!-- Input Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-green-75 mb-2">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full bg-gray-100 text-gray-800 text-sm rounded-lg focus:ring-blue-75 focus:border-blue-75 border-gray-300 p-3"
                            placeholder="Enter your email" required value="{{ old('email') }}" />

                    </div>

                    <!-- Input Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-green-75 mb-2">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full bg-gray-100 text-gray-800 text-sm rounded-lg focus:ring-blue-75 focus:border-blue-75 border-gray-300 p-3"
                            placeholder="Enter your password" required />
                    </div>



                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-green-75/80 hover:bg-green-75 text-white text-sm font-medium py-2 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-300">
                        Log in
                    </button>

                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </form>
                <p class="text-center text-black text-sm mt-4">
                    Don't have an account?
                    <a href="{{ route('register.view') }}" class="text-green-75 hover:underline">
                        Create account
                    </a>
                </p>
            </div>
            <!-- Link to Register -->

        </div>

    </main>

</body>

</html>
