<x-layouts.admin.admin-app>

    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
        <div class="max-w-4xl mx-auto bg-white p-6 xl:my-2 rounded shadow">
            <h1 class="text-2xl font-bold mb-4">Add New User</h1>
            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
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

                <!-- email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" id="email" name="email"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}" required>

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
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
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
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    @error('permissions')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror"
                            required>

                        <button type="button"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 focus:outline-none">
                            <i id="toggle-password-icon" class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('password_confirmation') border-red-500 @enderror"
                            required>

                        <!-- Icon to toggle password visibility -->
                        <button type="button"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 focus:outline-none">
                            <i id="toggle-password-icon" class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none">
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-layouts.admin.admin-app>
