<x-layouts.admin.admin-app>
    {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
    </div> --}}

    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
        @if (session('success'))
            <div class="bg-green-100  border border-green-400 text-green-700 m-2 px-4 py-3 rounded relative"
                role="alert">
                <span class="block sm:inline"> {{ session('success') }}
                </span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100  border border-red-400 text-red-700 m-2 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline"> {{ session('error') }}
                </span>
            </div>
        @endif

        <div class="p-2 flex flex-col lg:flex-row gap-4 justify-between items-center">
            <!-- Left Section: New Product Button and Dropdown -->
            <div class="flex flex-row gap-4 justify-start items-center">
                <!-- New Product Button -->
                <a href="{{ route('admin.products.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                    + New Product
                </a>

                <!-- Dropdown Select -->
                <form class="flex items-center gap-2" action="{{ route('admin.products.index') }}" method="GET">
                    @csrf
                    <select id="category" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($categories as $categoryName)
                            <option value="{{ $categoryName->slug }}"
                                {{ request('category') ? (request('category') == $categoryName->slug ? 'selected' : '') : ($categoryName->slug == 'all' ? 'selected' : '') }}>
                                {{ $categoryName->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-4 py-2 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Filter
                    </button>
                </form>
            </div>

            <!-- Right Section: Search Form -->
            <div>
                <form class="flex items-center" action="{{ route('admin.products.index') }}" method="GET">
                    @csrf
                    <div class="relative w-full max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="search" name="search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg ps-10 p-2.5 w-full focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search...">
                    </div>
                    <button type="submit"
                        class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
            </div>
        </div>



        <div class="relative overflow-x-auto px-2 ">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-tl-md ">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3 max-w-[600px]">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dimension (CM)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Material
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image (Click to view)
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-tr-md ">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $ind => $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 {{ $ind === last($products) ? 'rounded-bl-md' : '' }} font-medium text-gray-900 dark:text-white">
                                {{ $ind + 1 }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->category_id == 1 ? 'Chairs' : ($product->category_id == 2 ? 'Tables' : 'Others') }}
                            </td>
                            <td class="px-6 py-4 max-w-[600px]">
                                {{ $product->description }}
                            </td>
                            <td class="px-6 py-4">
                                IDR. {{ $product->price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ ($product->width ?? 0) . 'x' . ($product->long ?? 0) . 'x' . ($product->height ?? 0) }}
                                (WxLxH)
                            </td>
                            <td class="px-6 py-4">
                                <ul class="list-disc list-inside">
                                    @forelse ($product->product_materials as $material)
                                        <li class="text-left">
                                            {{ $material->name }}: {{ $material->pivot->quantity_used }}
                                            {{ $material->unit }}
                                        </li>
                                    @empty
                                        <span class="text-gray-500">-</span>
                                    @endforelse
                                </ul>
                            </td>
                            <td class="px-6 py-4">
                                @if ($product->product_photos->isNotEmpty())
                                    <img src="{{ asset('storage/' . $product->product_photos->where('is_main', true)->first()->photo_url) }}"
                                        alt="{{ $product->product_photos->first()->alt_text }}"
                                        class="object-cover w-full h-full max-w-[150px] max-h-[150px] cursor-pointer"
                                        data-modal-target="modal-{{ $product->id }}"
                                        data-modal-toggle="modal-{{ $product->id }}">
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 {{ $ind === last($products) ? 'rounded-br-md' : '' }} min-w-[200px]">
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Edit</a>
                                <button type="submit"
                                    class="bg-yellow-300 hover:bg-yellow-400 text-white py-2 px-4 rounded"
                                    data-modal-target="modal-trash-{{ $product->id }}"
                                    data-modal-toggle="modal-trash-{{ $product->id }}">trash</button>
                            </td>
                        </tr>


                        <div id="modal-trash-{{ $product->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="modal-trash-{{ $product->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                            sure you want to send this product to trash?</h3>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button data-modal-hide="modal-trash-{{ $product->id }}" type="submit"
                                                class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                        </form>
                                        <button data-modal-hide="modal-trash-{{ $product->id }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                            cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @if ($product->product_photos->isNotEmpty())
                            <div id="modal-{{ $product->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden fixed inset-0 z-50 flex justify-center items-center p-4 bg-black bg-opacity-50">
                                <div
                                    class="relative w-full max-w-lg max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 md:hidden hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-4 right-4"
                                        data-modal-hide="modal-{{ $product->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                    </button>
                                    <div class="p-4 space-y-4">
                                        <!-- Slider main container -->
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
                                                @foreach ($product->product_photos as $item)
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('storage/' . $item->photo_url) }}"
                                                            alt="{{ $item->alt_text }}"
                                                            class="object-contain select-none">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- Navigation buttons -->
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @empty
                        <tr>
                            <td class="px-6 py-4" colspan="9">
                                <span class="text-gray-500">No Product Found</span>
                            </td>
                        </tr>
                    @endforelse


                </tbody>

            </table>
            <div class="p-2">
                {{ $products->onEachSide(5)->links() }}

            </div>

        </div>
        <div class="relative overflow-x-auto px-2 ">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="bg-yellow-300 dark:bg-gray-700 dark:text-gray-400 ">
                        <th colspan="9" class="px-6 py-3 rounded-t-md">Trashed Product</th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3 max-w-[600px]">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dimension (CM)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Material
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image (Click to view)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashedProducts as $ind => $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 {{ $ind === last($products) ? 'rounded-bl-md' : '' }} font-medium text-gray-900 dark:text-white">
                                {{ $ind + 1 }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->category_id == 1 ? 'Chairs' : ($product->category_id == 2 ? 'Tables' : 'Others') }}
                            </td>
                            <td class="px-6 py-4 max-w-[600px]">
                                {{ $product->description }}
                            </td>
                            <td class="px-6 py-4">
                                IDR. {{ $product->price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ ($product->width ?? 0) . 'x' . ($product->long ?? 0) . 'x' . ($product->height ?? 0) }}
                                (WxLxH)
                            </td>
                            <td class="px-6 py-4">
                                <ul class="list-disc list-inside">
                                    @forelse ($product->product_materials as $material)
                                        <li class="text-left">
                                            {{ $material->name }}: {{ $material->pivot->quantity_used }}
                                            {{ $material->unit }}
                                        </li>
                                    @empty
                                        <span class="text-gray-500">-</span>
                                    @endforelse
                                </ul>
                            </td>
                            <td class="px-6 py-4">
                                @if ($product->product_photos->isNotEmpty())
                                    <img src="{{ asset('storage/' . $product->product_photos->where('is_main', true)->first()->photo_url) }}"
                                        alt="{{ $product->product_photos->first()->alt_text }}"
                                        class="object-cover w-full h-full max-w-[150px] max-h-[150px] cursor-pointer"
                                        data-modal-target="modal-{{ $product->id }}"
                                        data-modal-toggle="modal-{{ $product->id }}">
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 {{ $ind === last($products) ? 'rounded-br-md' : '' }} min-w-[200px]">
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-700 text-white py-2 px-2 rounded"
                                    data-modal-target="modal-restore-{{ $product->id }}"
                                    data-modal-toggle="modal-restore-{{ $product->id }}">Restore</button>
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white py-2 px-2 rounded"
                                    data-modal-target="modal-delete-{{ $product->id }}"
                                    data-modal-toggle="modal-delete-{{ $product->id }}">Delete</button>
                            </td>
                        </tr>


                        <div id="modal-restore-{{ $product->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="modal-restore-{{ $product->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                            sure you want to restore this product?</h3>
                                        <form action="{{ route('admin.products.restore', $product->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button data-modal-hide="modal-restore-{{ $product->id }}"
                                                type="submit"
                                                class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                        </form>
                                        <button data-modal-hide="modal-restore-{{ $product->id }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                            cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="modal-delete-{{ $product->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="modal-delete-{{ $product->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                            sure you want to <span class="text-red-600">delete</span> this product
                                            <span class="text-red-600">permanently</span>?
                                        </h3>
                                        <form action="{{ route('admin.products.permanentlyDelete', $product->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button data-modal-hide="modal-delete-{{ $product->id }}" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                        </form>
                                        <button data-modal-hide="modal-delete-{{ $product->id }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                            cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @if ($product->product_photos->isNotEmpty())
                            <div id="modal-{{ $product->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden fixed inset-0 z-50 flex justify-center items-center p-4 bg-black bg-opacity-50">
                                <div
                                    class="relative w-full max-w-lg max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 md:hidden hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-4 right-4"
                                        data-modal-hide="modal-{{ $product->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                    </button>
                                    <div class="p-4 space-y-4">
                                        <!-- Slider main container -->
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
                                                @foreach ($product->product_photos as $item)
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('storage/' . $item->photo_url) }}"
                                                            alt="{{ $item->alt_text }}"
                                                            class="object-contain select-none">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- Navigation buttons -->
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @empty
                        <tr>
                            <td class="px-6 py-4" colspan="9">
                                <span class="text-gray-500">No Product Found</span>
                            </td>
                        </tr>
                    @endforelse


                </tbody>

            </table>
            <div class="p-2">
                {{ $products->onEachSide(5)->links() }}

            </div>

        </div>
    </div>

</x-layouts.admin.admin-app>
