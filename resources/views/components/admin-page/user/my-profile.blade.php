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

        <div>
            <h1>My Profile</h1>
        </div>
        <div class="p-2 flex flex-col lg:flex-row gap-4 justify-between items-center">
        </div>

    </div>

</x-layouts.admin.admin-app>
