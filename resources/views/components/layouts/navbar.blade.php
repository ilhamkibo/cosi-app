<nav id="navbar"
    class="w-full py-2 relative z-50 text-lg sticky top-0 px-1 transition duration-300 ease-in-out backdrop-blur-sm">
    <div class="max-w-6xl mx-auto flex justify-between items-center md:px-10 xl:px-0">
        <div class="flex items-center px-2 md:px-0 justify-between px-1 md:px-0 sm:px-10 w-full md:w-max">
            <a id="changeableImage" class="p-1 w-24" href={{ route('home') }}>
                <img src="{{ asset('images/logo-color.png') }}" alt="cosi logo"
                    class="hover:scale-105 hover:transition hover:ease-in-out hover:duration-300">
            </a>
            <div class="md:hidden">
                <!-- Burger Icon -->
                <button id="burger-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7">
                        <path fill-rule="evenodd"
                            d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <!-- Navigation Links -->
            <div id="mobile-menu"
                class="hidden flex-col gap-4 bg-white absolute top-full left-4 right-4 rounded-lg shadow-lg p-4 md:hidden">
                <a href={{ route('products.index') }}
                    class="{{ request()->is('products*') ? 'bg-green-75/50' : '' }} block px-4 py-2 rounded-md hover:bg-green-75">Products</a>
                <a href={{ route('about') }}
                    class="{{ request()->is('about') ? 'bg-green-75/50' : '' }} block px-4 py-2 rounded-md hover:bg-green-75">About
                    Us</a>
                <a href={{ route('articles.index') }}
                    class="{{ request()->is('articles*') ? 'bg-green-75/50' : '' }} block px-4 py-2 rounded-md hover:bg-green-75">Articles</a>
                <a href={{ route('contact') }}
                    class="{{ request()->is('contact') ? 'bg-green-75/50' : '' }} block px-4 py-2 rounded-md hover:bg-green-75">Contact</a>
            </div>
        </div>
        <div class="gap-24 justify-center items-center hidden md:flex">
            <a href={{ route('products.index') }}
                class="{{ request()->is('products*') ? 'underline underline-offset-4 p-2 hover:text-black rounded-md' : 'hover:text-gray-400' }} text-sm hover:scale-105 hover:transition hover:duration-300 hover:ease-in-out">
                <h1>Products</h1>
            </a>
            <a href={{ route('about') }}
                class="{{ request()->is('about') ? 'underline underline-offset-4 p-2 hover:text-black rounded-md' : 'hover:text-gray-400' }} text-sm hover:scale-105 hover:transition hover:duration-300 hover:ease-in-out">
                <h1>About Us</h1>
            </a>
            <a href={{ route('articles.index') }}
                class="{{ request()->is('articles*') ? 'underline underline-offset-4 p-2 hover:text-black rounded-md' : 'hover:text-gray-400' }} text-sm hover:scale-105 hover:transition hover:duration-300 hover:ease-in-out">
                <h1>Articles</h1>
            </a>
            {{-- <a href={{ route('contact') }}
                class="{{ request()->is('contact') ? 'underline underline-offset-4 p-2 hover:text-black rounded-md' : 'hover:text-gray-400' }} text-sm hover:scale-105 hover:transition hover:duration-300 hover:ease-in-out">
                <h1>Contact</h1>
            </a> --}}
        </div>
        <div class="hidden md:flex md:gap-2">
            {{-- <a href={{ route('contact') }}
                class="{{ request()->is('contact') ? 'underline underline-offset-4 p-2 hover:text-black rounded-md' : 'hover:text-gray-400' }} text-sm hover:scale-105 hover:transition hover:duration-300 hover:ease-in-out p-2">
                Sign Up
            </a>
            <a href={{ route('login.view') }}
                class="{{ request()->is('contact') ? 'underline underline-offset-4 p-2 hover:text-black rounded-md' : 'hover:text-gray-400' }} text-sm hover:scale-105 hover:transition hover:duration-300 hover:ease-in-out p-2 bg-blue-75/50  rounded-md">
                Log In
            </a> --}}
            <a href={{ route('contact') }}
                class="{{ request()->is('contact') ? 'underline underline-offset-4 p-2 hover:text-black rounded-md' : 'hover:text-gray-400' }} text-sm hover:scale-105 hover:transition hover:duration-300 hover:ease-in-out">
                <h1>Contact</h1>
            </a>

        </div>
    </div>
</nav>
