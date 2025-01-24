<x-layouts.admin.admin-app>

    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
        <div class="max-w-4xl mx-auto bg-white p-6 xl:my-2 rounded shadow">
            <h1 class="text-2xl font-bold mb-4">Edit User</h1>
            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                        value="{{ old('name', $user->name) }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" id="email" name="email"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                        value="{{ old('email', $user->email) }}" required>

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Roles -->
                <div>
                    <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                    <select id="roles" name="roles[]" multiple
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('roles') border-red-500 @enderror">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}"
                                {{ collect(old('roles', $user->roles->pluck('name')))->contains($role->name) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('roles')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Permissions -->
                <div>
                    <label for="permissions" class="block text-sm font-medium text-gray-700">Permissions</label>
                    <select id="permissions" name="permissions[]" multiple
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('permissions') border-red-500 @enderror">
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}"
                                {{ collect(old('permissions', $user->permissions->pluck('name')))->contains($permission->name) ? 'selected' : '' }}>
                                {{ $permission->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('permissions')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none">
                        Edit User
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-layouts.admin.admin-app>
