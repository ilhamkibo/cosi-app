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

        <div class="p-2">
            <a href="{{ route('admin.products.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded inline-block">
                + New Product
            </a>
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
                                    @forelse ($product->materials as $material)
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
                                @if ($product->product_photo->isNotEmpty())
                                    <img src="{{ asset('storage/' . $product->product_photo->where('is_main', true)->first()->photo_url) }}"
                                        alt="{{ $product->product_photo->first()->alt_text }}"
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
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded"
                                    data-modal-target="modal-delete-{{ $product->id }}"
                                    data-modal-toggle="modal-delete-{{ $product->id }}">Delete</button>
                            </td>
                        </tr>

                        <div id="modal-delete-{{ $product->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="modal-delete-{{ $product->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                            sure you want to delete this product?</h3>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
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


                        @if ($product->product_photo->isNotEmpty())
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
                                                @foreach ($product->product_photo as $item)
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
        </div>
    </div>

</x-layouts.admin.admin-app>
