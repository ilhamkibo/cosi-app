<x-layouts.admin.admin-app>

    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div>
                <label for="content">Content:</label>
                <input type="hidden" id="content" value="Type something..." placeholder="Type something..."
                    name="content">
                <trix-editor input="content"></trix-editor>
            </div>


            <button type="submit">Submit</button>
        </form>
    </div>

</x-layouts.admin.admin-app>
