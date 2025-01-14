<x-layouts.admin.admin-app>

    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
        <div class="max-w-4xl mx-auto bg-white p-6 xl:my-2 rounded shadow">
            <h2 class="text-2xl font-semibold text-gray-800">Edit Product</h2>

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                        value="{{ old('name', $product->name) }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- SKU -->
                <div>
                    <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                    <input type="text" id="sku" name="sku"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('sku') border-red-500 @enderror"
                        value="{{ old('sku', $product->sku) }}" required>
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
                        required>{{ old('description', $product->description) }}</textarea>
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
                            value="{{ old('long', $product->long) }}" required>
                        @error('long')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="width" class="block text-sm font-medium text-gray-700">Dimension Width</label>
                        <input type="number" id="width" name="width" placeholder="cm"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('width') border-red-500 @enderror"
                            value="{{ old('width', $product->width) }}" required>
                        @error('width')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="height" class="block text-sm font-medium text-gray-700">Dimension Height</label>
                        <input type="number" id="height" name="height" placeholder="cm"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('height') border-red-500 @enderror"
                            value="{{ old('height', $product->height) }}" required>
                        @error('height')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Material -->
                <div id="materials-container">
                    <label for="materials" class="block text-sm font-medium text-gray-700 mb-1">Materials</label>
                    @foreach ($product->material as $index => $material)
                        <div class="flex space-x-4 mb-2 items-center" id="material-row-{{ $index }}">
                            <select name="materials[{{ $index }}][material_id]"
                                class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                                <option value="" disabled>Select Material</option>
                                @foreach ($materials as $materialOption)
                                    <option value="{{ $materialOption->id }}"
                                        {{ $materialOption->id == $material->id ? 'selected' : '' }}>
                                        {{ $materialOption->name }}</option>
                                @endforeach
                            </select>

                            <input type="number" name="materials[{{ $index }}][quantity_used]"
                                value="{{ old('materials.' . $index . '.quantity_used', $material->pivot->quantity_used) }}"
                                placeholder="Quantity Used"
                                class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required>

                            <button type="button"
                                class="px-2 py-1 text-red-500 hover:text-red-700 focus:outline-none remove-material"
                                onclick="removeMaterial({{ $index }})">
                                Remove
                            </button>
                        </div>
                    @endforeach
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
                        value="{{ old('price', $product->price) }}" required>
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
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                        value="{{ old('stock', $product->stock) }}" required>
                    @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photos -->

                <div>
                    <label for="photos" class="block text-sm font-medium text-gray-700">Product Photos</label>

                    <!-- Menampilkan foto yang sudah ada -->
                    <div id="existing-photos">
                        @foreach ($product->product_photo as $photo)
                            <div class="flex items-center mb-2 gap-4" id="photo-row-{{ $photo->id }}">
                                <img src="{{ asset('storage/' . $photo->photo_url) }}" alt="Product Photo"
                                    class="w-16 h-16 object-cover mr-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="delete_photos[]" value="{{ $photo->id }}"
                                        class="mr-2">
                                    <span>Remove</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="is_main[]" value="{{ $photo->id }}"
                                        {{ $photo->is_main ? 'checked' : '' }} class="mr-2">
                                    <span>Main Photo</span>
                                </label>
                            </div>
                        @endforeach
                    </div>



                    <!-- Input untuk foto baru -->
                    <input type="file" id="photos" name="photos[]"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        multiple accept="image/*">
                    <p class="text-gray-500 text-sm mt-1">Maximum file size: 2MB per photo.</p>
                    @foreach ($errors->get('photos.*') as $messages)
                        @foreach ($messages as $message)
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @endforeach
                    @endforeach
                    <div id="photoUploadStatus" class="mt-2 text-sm"></div>
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
        function removeMaterial(index) {
            const materialRow = document.getElementById('material-row-' + index);
            materialRow.remove();
        }


        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-material').addEventListener('click', function() {
                const container = document.getElementById('materials-container');
                const newIndex = container.children.length;

                const newMaterialRow = document.createElement('div');
                newMaterialRow.classList.add('flex', 'space-x-4', 'mb-2', 'items-center');
                newMaterialRow.id = 'material-row-' + newIndex;

                newMaterialRow.innerHTML = `
                    <select name="materials[${newIndex}][material_id]" class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="" disabled>Select Material</option>
                        @foreach ($materials as $materialOption)
                            <option value="{{ $materialOption->id }}">{{ $materialOption->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="materials[${newIndex}][quantity_used]" placeholder="Quantity Used" class="block w-1/2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    <button type="button" class="px-2 py-1 text-red-500 hover:text-red-700 focus:outline-none remove-material" onclick="removeMaterial(${newIndex})">
                        Remove
                    </button>
                `;

                container.appendChild(newMaterialRow);
            });

            document
                .getElementById("photos")
                .addEventListener("change", function(event) {
                    const files = event.target.files;
                    const maxFileSize = 2 * 1024 * 1024; // 2MB
                    const statusContainer =
                        document.getElementById("photoUploadStatus");
                    let valid = true;

                    // Reset status
                    statusContainer.innerHTML = "";

                    if (files.length === 0) {
                        statusContainer.innerHTML =
                            '<p class="text-gray-500">No files selected.</p>';
                        return;
                    }

                    Array.from(files).forEach((file) => {
                        if (file.size > maxFileSize) {
                            valid = false;
                            statusContainer.innerHTML +=
                                `<p class="text-red-500">File "${file.name}" is too large (max 2MB).</p>`;
                        } else {
                            statusContainer.innerHTML +=
                                `<p class="text-green-500">File "${file.name}" is ready to upload.</p>`;
                        }
                    });

                    // Disable submit button if validation fails
                    const submitButton = document.querySelector(
                        'button[type="submit"]'
                    );
                    if (!valid) {
                        submitButton.disabled = true;
                        submitButton.classList.add("bg-gray-500");
                        submitButton.classList.remove(
                            "bg-indigo-600",
                            "hover:bg-indigo-700"
                        );
                    } else {
                        submitButton.disabled = false;
                        submitButton.classList.remove("bg-gray-500");
                        submitButton.classList.add(
                            "bg-indigo-600",
                            "hover:bg-indigo-700"
                        );
                    }
                });

            const mainPhotoCheckboxes = document.querySelectorAll('input[name="is_main[]"]');

            mainPhotoCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Jika checkbox dicentang
                    if (checkbox.checked) {
                        // Uncheck semua checkbox lain
                        mainPhotoCheckboxes.forEach(function(otherCheckbox) {
                            if (otherCheckbox !== checkbox) {
                                otherCheckbox.checked = false;
                            }
                        });
                    }
                });
            });
        });
    </script>

</x-layouts.admin.admin-app>
