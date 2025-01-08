<x-layouts.admin.admin-app>


    <div class="border-2 border-dashed rounded-lg  border-gray-300 dark:border-gray-600 mb-4">
        @foreach ($roles as $item)
            <h1>{{ $item }}</h1>
        @endforeach
    </div>

</x-layouts.admin.admin-app>
