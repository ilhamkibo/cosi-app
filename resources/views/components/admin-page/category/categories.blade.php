<x-layouts.admin.admin-app>



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

        @if (session('info'))
            <div class="bg-yellow-100  border border-yellow-400 text-yellow-700 m-2 px-4 py-3 rounded relative"
                role="alert">
                <span class="block sm:inline"> {{ session('info') }}
                </span>
            </div>
        @endif

        <div class="p-2 flex flex-col lg:flex-row gap-4 justify-between items-center">
            <!-- Left Section: New Product Button and Dropdown -->
            <div class="flex flex-row gap-4 justify-start items-center">
                <!-- New Product Button -->
                <a href="{{ route('admin.categories.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                    + New Category
                </a>

            </div>

            <!-- Right Section: Search Form -->
            <div>
                <form class="flex items-center" action="{{ route('admin.categories.index') }}" method="GET">
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
                            Category Name
                        </th>
                        <th scope="col" class="px-6 py-3 max-w-[600px]">
                            Slug
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Description
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
                    @forelse ($categories as $ind => $category)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 {{ $ind === last($categories) ? 'rounded-bl-md' : '' }} font-medium text-gray-900 dark:text-white">
                                {{ $ind + 1 }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $category->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $category->slug }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $category->description }}
                            </td>
                            <td class="px-6 py-4 text-center flex justify-center items-center">
                                <img src="{{ asset('storage/' . $category->photo_url) }}"
                                    alt="{{ $category->name . ' Image' }}"
                                    class="object-cover object-center w-full h-full max-w-[150px] max-h-[150px] cursor-pointer"
                                    data-modal-target="modal-{{ $category->id }}"
                                    data-modal-toggle="modal-{{ $category->id }}">

                            </td>
                            <td
                                class="px-6 py-4 {{ $ind === last($categories) ? 'rounded-br-md' : '' }} min-w-[200px]">
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Edit</a>
                                <button type="submit"
                                    class="bg-yellow-300 hover:bg-yellow-400 text-white py-2 px-4 rounded"
                                    data-modal-target="modal-trash-{{ $category->id }}"
                                    data-modal-toggle="modal-trash-{{ $category->id }}">trash</button>
                            </td>
                        </tr>


                        <div id="modal-trash-{{ $category->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="modal-trash-{{ $category->id }}">
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
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                            sure you want to send this product to trash?</h3>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button data-modal-hide="modal-trash-{{ $category->id }}" type="submit"
                                                class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                        </form>
                                        <button data-modal-hide="modal-trash-{{ $category->id }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                            cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @if ($category->photo_url != null)
                            <div id="modal-{{ $category->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden fixed inset-0 z-50 flex justify-center items-center p-4 bg-black bg-opacity-50">
                                <div
                                    class="relative w-full max-w-lg max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 md:hidden hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-4 right-4"
                                        data-modal-hide="modal-{{ $category->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                    </button>
                                    <div class="p-4 space-y-4">
                                        <!-- Slider main container -->
                                        <img src="{{ asset('storage/' . $category->photo_url) }}"
                                            alt="{{ $category->name . 's image' }}"
                                            class="object-contain select-none">
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
                {{ $categories->onEachSide(5)->links() }}

            </div>

        </div>
        <div class="relative overflow-x-auto px-2 ">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="bg-yellow-300 dark:bg-gray-700 dark:text-gray-400 ">
                        <th colspan="9" class="px-6 py-3 rounded-t-md text-xl">Categories Trashed</th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-tl-md ">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category Name
                        </th>
                        <th scope="col" class="px-6 py-3 max-w-[600px]">
                            Slug
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Description
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
                    @forelse ($trashedCategories as $ind => $category)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 {{ $ind === last($categories) ? 'rounded-bl-md' : '' }} font-medium text-gray-900 dark:text-white">
                                {{ $ind + 1 }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $category->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $category->slug }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $category->description }}
                            </td>
                            <td class="px-6 py-4 text-center flex justify-center items-center">
                                <img src="{{ asset('storage/' . $category->photo_url) }}"
                                    alt="{{ $category->name . ' Image' }}"
                                    class="object-cover object-center w-full h-full max-w-[150px] max-h-[150px] cursor-pointer"
                                    data-modal-target="modal-{{ $category->id }}"
                                    data-modal-toggle="modal-{{ $category->id }}">

                            </td>
                            <td
                                class="px-6 py-4 {{ $ind === last($categories) ? 'rounded-br-md' : '' }} min-w-[200px]">
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-700 text-white py-2 px-2 rounded"
                                    data-modal-target="modal-restore-{{ $category->id }}"
                                    data-modal-toggle="modal-restore-{{ $category->id }}">Restore</button>
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded"
                                    data-modal-target="modal-delete-{{ $category->id }}"
                                    data-modal-toggle="modal-delete-{{ $category->id }}">Delete</button>
                            </td>
                        </tr>

                        <div id="modal-restore-{{ $category->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="modal-restore-{{ $category->id }}">
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
                                            sure you want to restore this category?</h3>
                                        <form action="{{ route('admin.categories.restore', $category->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button data-modal-hide="modal-restore-{{ $category->id }}"
                                                type="submit"
                                                class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                        </form>
                                        <button data-modal-hide="modal-restore-{{ $category->id }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                            cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="modal-delete-{{ $category->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="modal-delete-{{ $category->id }}">
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
                                            sure you want to <span class="text-red-600">permanently delete</span> this
                                            category?</h3>
                                        <form
                                            action="{{ route('admin.categories.permanentlyDelete', $category->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button data-modal-hide="modal-delete-{{ $category->id }}" type="submit"
                                                class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                        </form>
                                        <button data-modal-hide="modal-delete-{{ $category->id }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                            cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @if ($category->photo_url != null)
                            <div id="modal-{{ $category->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden fixed inset-0 z-50 flex justify-center items-center p-4 bg-black bg-opacity-50">
                                <div
                                    class="relative w-full max-w-lg max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 md:hidden hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-4 right-4"
                                        data-modal-hide="modal-{{ $category->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                    </button>
                                    <div class="p-4 space-y-4">
                                        <!-- Slider main container -->
                                        <img src="{{ asset('storage/' . $category->photo_url) }}"
                                            alt="{{ $category->name . 's image' }}"
                                            class="object-contain select-none">
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
                {{ $trashedCategories->onEachSide(5)->links() }}

            </div>

        </div>
    </div>

</x-layouts.admin.admin-app>
