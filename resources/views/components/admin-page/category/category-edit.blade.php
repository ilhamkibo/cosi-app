<x-layouts.admin.admin-app>


    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
        <div class="max-w-4xl mx-auto bg-white p-6 xl:my-2 rounded shadow">
            <h1 class="text-2xl font-bold mb-4">Edit Category</h1>
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-4"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                        value="{{ old('name', $category->name) }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" id="slug" name="slug" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('slug') border-red-500 @enderror"
                        value="{{ old('slug', $category->slug) }}">
                    @error('slug')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" required rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <img src="{{ asset('storage/' . $category->photo_url) }}" alt="Current Image"
                        class="w-56 h-32 object-contain">
                </div>
                <div>
                    <input type="file" id="image" name="image"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('image') border-red-500 @enderror">
                    <p class="text-gray-500 text-sm mt-1">Maximum file size: 2MB per photo. If u want to change the
                        image, please upload a new one</p>

                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none">
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin.admin-app>
