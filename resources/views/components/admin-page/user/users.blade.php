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

        @if (session('info'))
            <div class="bg-yellow-100  border border-yellow-400 text-yellow-700 m-2 px-4 py-3 rounded relative"
                role="alert">
                <span class="block sm:inline"> {{ session('info') }}
                </span>
            </div>
        @endif

        <div class="p-2 flex flex-col md:flex-row gap-4 justify-between items-center">
            <!-- Left Section: New Product Button and Dropdown -->
            <div class="flex flex-row gap-4 justify-start items-center">
                <!-- New Product Button -->
                <a href="{{ route('admin.users.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                    + New Users
                </a>
            </div>

            {{-- <!-- Right Section: Search Form -->
            <div>
                <form class="flex items-center" action="{{ route('admin.users.index') }}" method="GET">
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
            </div> --}}
        </div>



        <div class="relative overflow-x-auto px-2 ">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-tl-md ">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Permission
                        </th>
                        <th scope="col" class="px-6 py-3 max-w-[600px]">
                            Verified At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $ind => $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 {{ $ind === last($users) ? 'rounded-bl-md' : '' }} font-medium text-gray-900 dark:text-white">
                                {{ $ind + 1 }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                <ul class="list-disc list-inside">


                                    @forelse ($user->getRoleNames() as $role)
                                        <li>{{ $role }}</li>
                                    @empty
                                        <li>No Role</li>
                                    @endforelse
                                </ul>
                            </td>
                            <td class="px-6 py-4">
                                <ul class="list-disc list-inside">
                                    @forelse ($user->getPermissionNames() as $role)
                                        <li>{{ $role }}</li>
                                    @empty
                                        <li>No Spesific Permission</li>
                                    @endforelse
                                </ul>
                            </td>
                            <td class="px-6 py-4 max-w-[600px]">
                                @if ($user->email_verified_at)
                                    {{ $user->email_verified_at }}
                                @else
                                    <form action="{{ route('verification.send') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <button type="submit" class="text-blue-500 hover:underline">Resend
                                            Verification
                                            Email</button>
                                    </form>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->created_at }}
                            </td>
                            <td class="px-6 py-4 {{ $ind === last($users) ? 'rounded-br-md' : '' }} min-w-[200px]">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Edit</a>
                                @if ($user->id != Auth::user()->id)
                                    <button type="submit"
                                        class="bg-yellow-300 hover:bg-yellow-400 text-white py-2 px-4 rounded"
                                        data-modal-target="modal-trash-{{ $user->id }}"
                                        data-modal-toggle="modal-trash-{{ $user->id }}">trash</button>
                                @endif

                            </td>
                        </tr>

                        @if ($user->id != Auth::user()->id)
                            <div id="modal-trash-{{ $user->id }}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="modal-trash-{{ $user->id }}">
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
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                                you
                                                sure you want to send this user to trash?</h3>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button data-modal-hide="modal-trash-{{ $user->id }}"
                                                    type="submit"
                                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Yes, I'm sure
                                                </button>
                                            </form>
                                            <button data-modal-hide="modal-trash-{{ $user->id }}" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <tr>
                            <td class="px-6 py-4" colspan="9">
                                <span class="text-gray-500">No Users Found</span>
                            </td>
                        </tr>
                    @endforelse


                </tbody>

            </table>
            <div class="p-2">
                {{ $users->onEachSide(5)->links() }}

            </div>

        </div>
        <div class="relative overflow-x-auto px-2 ">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="bg-yellow-300 dark:bg-gray-700 dark:text-gray-400 ">
                        <th colspan="9" class="px-6 py-3 rounded-t-md text-xl">Users Trashed</th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-tl-md ">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Permission
                        </th>
                        <th scope="col" class="px-6 py-3 max-w-[600px]">
                            Verified At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashedUsers as $ind => $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-3 py-2 {{ $ind + $users->firstItem() === last($users) ? 'rounded-bl-md' : '' }} font-medium text-gray-900 dark:text-white">
                                {{ $ind + $users->firstItem() }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                <ul class="list-disc list-inside">


                                    @forelse ($user->getRoleNames() as $role)
                                        <li>{{ $role }}</li>
                                    @empty
                                        <li>No Role</li>
                                    @endforelse
                                </ul>
                            </td>
                            <td class="px-6 py-4">
                                <ul class="list-disc list-inside">
                                    @forelse ($user->getPermissionNames() as $role)
                                        <li>{{ $role }}</li>
                                    @empty
                                        <li>No Spesific Permission</li>
                                    @endforelse
                                </ul>
                            </td>
                            <td class="px-6 py-4 max-w-[600px]">
                                @if ($user->email_verified_at)
                                    {{ $user->email_verified_at }}
                                @else
                                    <form action="{{ route('verification.send') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <button type="submit" class="text-blue-500 hover:underline">Resend
                                            Verification
                                            Email</button>
                                    </form>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->created_at }}
                            </td>
                            <td class="px-6 py-4 {{ $ind === last($users) ? 'rounded-br-md' : '' }} min-w-[200px]">
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-700 text-white py-2 px-2 rounded"
                                    data-modal-target="modal-restore-{{ $user->id }}"
                                    data-modal-toggle="modal-restore-{{ $user->id }}">Restore</button>
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white py-2 px-2 rounded"
                                    data-modal-target="modal-delete-{{ $user->id }}"
                                    data-modal-toggle="modal-delete-{{ $user->id }}">Delete</button>
                            </td>
                        </tr>


                        <div id="modal-restore-{{ $user->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="modal-restore-{{ $user->id }}">
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
                                            sure you want to restore this user?</h3>
                                        <form action="{{ route('admin.users.restore', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button data-modal-hide="modal-restore-{{ $user->id }}"
                                                type="submit"
                                                class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                        </form>
                                        <button data-modal-hide="modal-restore-{{ $user->id }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                            cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="modal-delete-{{ $user->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="modal-delete-{{ $user->id }}">
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
                                            sure you want to <span class="text-red-600">delete</span> this user
                                            <span class="text-red-600">permanently</span>?
                                        </h3>
                                        <form action="{{ route('admin.users.permanentlyDelete', $user->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button data-modal-hide="modal-delete-{{ $user->id }}" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                        </form>
                                        <button data-modal-hide="modal-delete-{{ $user->id }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                            cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @empty
                        <tr>
                            <td class="px-6 py-4" colspan="9">
                                <span class="text-gray-500">No Users Found</span>
                            </td>
                        </tr>
                    @endforelse


                </tbody>

            </table>
            <div class="p-2">
                {{ $users->onEachSide(5)->links() }}

            </div>

        </div>
    </div>

</x-layouts.admin.admin-app>
