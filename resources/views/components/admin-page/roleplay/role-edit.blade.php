<x-layouts.admin.admin-app>

    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
        <div class="max-w-4xl mx-auto bg-white p-6 xl:my-2 rounded shadow">
            <h1 class="text-2xl font-bold mb-4">Edit role {{ $role->name }}</h1>
            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                        value="{{ old('name', $role->name) }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Permissions -->
                <div>
                    <label for="permissions" class="block text-sm font-medium text-gray-700">Permissions</label>
                    <div class="mt-2 grid grid-cols-4 gap-4">
                        @foreach ($permissions as $permission)
                            <div class="flex items-center">
                                <input id="permission-{{ $permission->id }}" name="permissions[]" type="checkbox"
                                    value="{{ $permission->name }}"
                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 @error('permissions') border-red-500 @enderror"
                                    {{ in_array($permission->name, old('permissions', $role->permissions->pluck('name')->toArray())) ? 'checked' : '' }}>

                                <label for="permission-{{ $permission->id }}" class="ml-2 block text-sm text-gray-900">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('permissions')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none">
                        Edit Role
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-layouts.admin.admin-app>
