<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::with('roles')->paginate(10);
        return view('components.admin-page.user.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('components.admin-page.user.user-create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'roles' => 'array', // Roles harus berupa array
            'roles.*' => 'exists:roles,name', // Setiap role harus ada di tabel roles
            'permissions' => 'array', // Permissions harus berupa array
            'permissions.*' => 'exists:permissions,name', // Setiap permission harus ada di tabel permissions
        ]);
        // dd($validatedData);
        // Buat user baru
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);


        // Assign roles ke user
        if (isset($validatedData['roles'])) {
            $user->syncRoles($validatedData['roles']);
        }

        // Assign permissions ke user
        if (isset($validatedData['permissions'])) {
            $user->syncPermissions($validatedData['permissions']);
        }

        event(new Registered($user));

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('components.admin-page.user.user-edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
