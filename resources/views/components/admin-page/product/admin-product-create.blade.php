<x-layouts.admin.admin-app>

    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
        <div class="max-w-4xl mx-auto bg-white p-6 xl:my-2 rounded shadow">
            <h1 class="text-2xl font-bold mb-4">Add New Product</h1>
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- SKU -->
                <div>
                    <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                    <input type="text" id="sku" name="sku"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('sku') border-red-500 @enderror"
                        value="{{ old('sku') }}" required>
                    <p class="text-gray-500 text-sm mt-1">1000: Chairs, 2000: Tables, 3000: Others</p>

                    @error('sku')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror"
                        required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dimensions -->
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label for="long" class="block text-sm font-medium text-gray-700">Dimension Long</label>
                        <input type="number" id="long" name="long" placeholder="cm"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('long') border-red-500 @enderror"
                            value="{{ old('long') }}" required>
                        @error('long')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="width" class="block text-sm font-medium text-gray-700">Dimension Width</label>
                        <input type="number" id="width" name="width" placeholder="cm"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('width') border-red-500 @enderror"
                            value="{{ old('width') }}" required>
                        @error('width')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="height" class="block text-sm font-medium text-gray-700">Dimension Height</label>
                        <input type="number" id="height" name="height" placeholder="cm"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('height') border-red-500 @enderror"
                            value="{{ old('height') }}" required>
                        @error('height')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Material -->
                {{-- <div>
                    <label for="materials" class="block text-sm font-medium text-gray-700 mb-1">Materials</label>
                    <select id="materials" name="materials[]" multiple
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('materials') border-red-500 @enderror">
                        @foreach ($materials as $material)
                            <option value="{{ $material->id }}"
                                {{ in_array($material->id, old('materials', [])) ? 'selected' : '' }}>
                                {{ $material->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('materials')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}
                <div id="materials-container">
                    <label for="materials" class="block text-sm font-medium text-gray-700 mb-1">Materials</label>
                    <div class="flex space-x-4 mb-2 items-center">
                        <!-- Dropdown untuk Material -->
                        <select name="materials[0][material_id]"
                            class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                            <option value="" disabled selected>Select Material</option>
                            @foreach ($materials as $material)
                                <option value="{{ $material->id }}">{{ $material->name }}</option>
                            @endforeach
                        </select>

                        <!-- Input untuk Quantity Used -->
                        <input type="number" name="materials[0][quantity_used]" placeholder="Quantity Used"
                            class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>

                        <!-- Tombol Hapus -->
                        <button type="button"
                            class="px-2 py-1 text-red-500 hover:text-red-700 focus:outline-none remove-material">
                            Remove
                        </button>
                    </div>
                </div>

                <button type="button" id="add-material"
                    class="mt-2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none">
                    Add Material
                </button>


                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" step="0.01" id="price" name="price"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('price') border-red-500 @enderror"
                        value="{{ old('price') }}" required>
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category ID -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select id="category_id" name="category_id"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('category_id') border-red-500 @enderror"
                        required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                @if ($category->name !== 'All')
                                    {{ $category->name }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Stock Quantity -->
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                    <input type="number" id="stock" name="stock"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('stock') border-red-500 @enderror"
                        value="{{ old('stock') }}" required>
                    @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photos -->
                <div>
                    <label for="photos" class="block text-sm font-medium text-gray-700">Product Photos</label>
                    <input type="file" id="photos" name="photos[]"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('photos.*') border-red-500 @enderror"
                        multiple accept="image/*">
                    <p class="text-gray-500 text-sm mt-1">Maximum file size: 2MB per photo.</p>
                    <div id="photoUploadStatus" class="mt-2 text-sm"></div>
                    @foreach ($errors->get('photos.*') as $messages)
                        @foreach ($messages as $message)
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @endforeach
                    @endforeach
                </div>


                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none">
                        Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        let materialIndex = 1;

        document.getElementById('add-material').addEventListener('click', () => {
            const container = document.getElementById('materials-container');
            const newMaterial = `
                <div class="flex space-x-4 mb-2 items-center">
                    <!-- Dropdown untuk Material -->
                    <select name="materials[${materialIndex}][material_id]" class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="" disabled selected>Select Material</option>
                        @foreach ($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                        @endforeach
                    </select>
    
                    <!-- Input untuk Quantity Used -->
                    <input type="number" name="materials[${materialIndex}][quantity_used]" placeholder="Quantity Used"
                        class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
    
                    <!-- Tombol Hapus -->
                    <button type="button" onclick="removeMaterial(this)"
                        class="px-2 py-1 text-red-500 hover:text-red-700 focus:outline-none">Remove</button>
                </div>`;
            container.insertAdjacentHTML('beforeend', newMaterial);
            materialIndex++;
        });

        function removeMaterial(button) {
            button.parentElement.remove();
        }
    </script>

</x-layouts.admin.admin-app>
