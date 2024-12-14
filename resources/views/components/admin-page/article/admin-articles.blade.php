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

        <div class="p-2">
            <a href="{{ route('admin.articles.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded inline-block">
                + New Article
            </a>
        </div>

    </div>

</x-layouts.admin.admin-app>
