<x-layouts.admin.admin-app>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="bg-white shadow-sm shadow-gray-500/50 rounded-lg">
            <div class="p-2 flex items-center justify-between">
                <h1 class="text-lg">Products</h1>
                <a href="{{ route('admin.products.index') }}" class="text-blue-500 hover:underline">See All ></a>
            </div>
            <div class="flex flex-col gap-4 justify-center items-center px-4 pb-4 mt-1">
                <div>
                    <h1>All Products</h1>
                    <div
                        class="flex items-center justify-center w-24 h-24 rounded-full border-2 border-blue-500 bg-gray-100">
                        <h1 class="text-3xl font-bold text-blue-500">{{ $totalProducts }}</h1>
                    </div>
                </div>
                <div class="w-full flex justify-center items-center gap-8">
                    @foreach ($categories as $categoryProduct)
                        @if ($categoryProduct->name != 'All')
                            <div>
                                <h1>{{ $categoryProduct->name }}</h1>
                                <div
                                    class="flex items-center justify-center w-14 h-14 rounded-full border-2 border-blue-500 bg-gray-100">
                                    <h1 class="text-xl font-bold text-blue-500">{{ $categoryProduct->product_count }}
                                    </h1>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
        <div class="bg-white shadow-sm shadow-gray-500/50 rounded-lg">
            <div class="p-2 flex items-center justify-between">
                <h1 class="text-lg">Articles</h1>
                <a href="{{ route('admin.articles') }}" class="text-blue-500 hover:underline">See All ></a>
            </div>
            <div class="flex flex-col gap-4 justify-center items-center px-4 pb-4 mt-1">
                <div>
                    <h1>All Articles</h1>
                    <div
                        class="flex items-center justify-center w-24 h-24 rounded-full border-2 border-blue-500 bg-gray-100">
                        <h1 class="text-3xl font-bold text-blue-500">{{ $totalArticles }}</h1>
                    </div>
                </div>
                <div class="w-full flex justify-center items-center gap-8">
                    @foreach ($categoriesCount as $articleCategory)
                        <div>
                            <h1>{{ $articleCategory['name'] }}</h1>
                            <div
                                class="flex items-center justify-center w-14 h-14 rounded-full border-2 border-blue-500 bg-gray-100">
                                <h1 class="text-xl font-bold text-blue-500">{{ $articleCategory['count'] }}</h1>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bg-white shadow-sm shadow-gray-500/50 rounded-lg">
            <h1 class="p-2">Total Sales</h1>
            <div class="flex h-full justify-center items-center">
                <h1 class="text-3xl">$4,000,000.00</h1>
            </div>
        </div>

    </div>
    <div class="grid grid-cols-1 mt-4 md:grid-cols-2 md:gap-4">
        <div class="grid gap-4 grid-cols-1 lg:grid-cols-2">
            <div class="flex flex-row items-center p-2 gap-2 bg-white rounded-md shadow-sm shadow-gray-500/50">
                <div class="bg-blue-75/30 p-3 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="size-5 text-blue-75">
                        <path
                            d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-gray-400 text-sm">Customers</h3>
                    <h1 class="text-lg font-medium">
                        1200
                    </h1>
                </div>
            </div>
            <div class="flex flex-row items-center p-2 gap-2 bg-white rounded-md shadow-sm shadow-gray-500/50">
                <div class="bg-green-75/30 p-3 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="size-5 text-green-75">
                        <path fill-rule="evenodd"
                            d="M2 3a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H2Zm0 4.5h16l-.811 7.71a2 2 0 0 1-1.99 1.79H4.802a2 2 0 0 1-1.99-1.79L2 7.5ZM10 9a.75.75 0 0 1 .75.75v2.546l.943-1.048a.75.75 0 1 1 1.114 1.004l-2.25 2.5a.75.75 0 0 1-1.114 0l-2.25-2.5a.75.75 0 1 1 1.114-1.004l.943 1.048V9.75A.75.75 0 0 1 10 9Z"
                            clip-rule="evenodd" />
                    </svg>

                </div>
                <div>
                    <h3 class="text-gray-400 text-sm">Suppliers</h3>
                    <h1 class="text-lg font-medium">
                        1200
                    </h1>
                </div>
            </div>
            <div class="flex flex-row items-center p-2 gap-2 bg-white rounded-md shadow-sm shadow-gray-500/50">
                <div class="bg-red-400/30 p-3 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="size-5 text-red-700">
                        <path fill-rule="evenodd"
                            d="M14.5 10a4.5 4.5 0 0 0 4.284-5.882c-.105-.324-.51-.391-.752-.15L15.34 6.66a.454.454 0 0 1-.493.11 3.01 3.01 0 0 1-1.618-1.616.455.455 0 0 1 .11-.494l2.694-2.692c.24-.241.174-.647-.15-.752a4.5 4.5 0 0 0-5.873 4.575c.055.873-.128 1.808-.8 2.368l-7.23 6.024a2.724 2.724 0 1 0 3.837 3.837l6.024-7.23c.56-.672 1.495-.855 2.368-.8.096.007.193.01.291.01ZM5 16a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"
                            clip-rule="evenodd" />
                        <path
                            d="M14.5 11.5c.173 0 .345-.007.514-.022l3.754 3.754a2.5 2.5 0 0 1-3.536 3.536l-4.41-4.41 2.172-2.607c.052-.063.147-.138.342-.196.202-.06.469-.087.777-.067.128.008.257.012.387.012ZM6 4.586l2.33 2.33a.452.452 0 0 1-.08.09L6.8 8.214 4.586 6H3.309a.5.5 0 0 1-.447-.276l-1.7-3.402a.5.5 0 0 1 .093-.577l.49-.49a.5.5 0 0 1 .577-.094l3.402 1.7A.5.5 0 0 1 6 3.31v1.277Z" />
                    </svg>

                </div>
                <div>
                    <h3 class="text-gray-400 text-sm">Vendors</h3>
                    <h1 class="text-lg font-medium">
                        1200
                    </h1>
                </div>
            </div>
            <div class="flex flex-row items-center p-2 gap-2 bg-white rounded-md shadow-sm shadow-gray-500/50">
                <div class="bg-yellow-400/30 p-3 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="size-5 text-yellow-700">
                        <path fill-rule="evenodd"
                            d="M6 3.75A2.75 2.75 0 0 1 8.75 1h2.5A2.75 2.75 0 0 1 14 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 0 1 6 4.193V3.75Zm6.5 0v.325a41.622 41.622 0 0 0-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25ZM10 10a1 1 0 0 0-1 1v.01a1 1 0 0 0 1 1h.01a1 1 0 0 0 1-1V11a1 1 0 0 0-1-1H10Z"
                            clip-rule="evenodd" />
                        <path
                            d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 0 1-9.274 0C3.985 17.585 3 16.402 3 15.055Z" />
                    </svg>

                </div>
                <div>
                    <h3 class="text-gray-400 text-sm">Work Orders</h3>
                    <h1 class="text-lg font-medium">
                        1200
                    </h1>
                </div>
            </div>
        </div>
        <div
            class="w-full bg-white flex justify-center items-center shadow-sm mt-4 md:mt-0 shadow-gray-500/50 rounded-lg">
            <h1>123</h1>
        </div>
    </div>
</x-layouts.admin.admin-app>
