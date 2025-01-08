<x-layouts.main-app>
    <div class="flex flex-col justify-between items-center min-h-screen bg-gray-100 px-5 md:px-0">
        <!-- Container -->
        <div class="relative bg-white w-full max-w-md rounded-lg shadow-lg overflow-hidden md:mt-52 mt-28 mb-12"
            style="background-image: url('/images/login.png'); background-size: cover; background-position: center;">

            <!-- Overlay Gelap -->
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <!-- Form Login -->
            <div class="relative p-8 z-10">
                <h1 class="text-center text-2xl font-semibold text-white mb-6">Login</h1>
                <form method="POST" action="{{ route('admin.login.post') }}">
                    @csrf
                    <!-- Input Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-white mb-2">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full bg-gray-100 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 border-gray-300 p-3"
                            placeholder="Enter your email" required value="{{ old('email') }}" />

                    </div>

                    <!-- Input Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-white mb-2">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full bg-gray-100 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 border-gray-300 p-3"
                            placeholder="Enter your password" required />
                    </div>



                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-blue-75/50 hover:bg-blue-75 text-white text-sm font-medium py-2 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-300">
                        Log in
                    </button>

                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </form>
            </div>
        </div>
        <div class="w-full">
            @include('components.layouts.footer')
        </div>
    </div>
</x-layouts.main-app>
