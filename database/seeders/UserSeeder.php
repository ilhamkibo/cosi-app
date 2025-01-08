<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat pengguna admin
        $adminUser = User::create([
            'name' => 'Ilham Prima',
            'email' => 'ilham.ilam59@gmail.com',
            'password' => bcrypt('Ilhamazz123*'),
        ]);

        // Membuat peran admin
        $role = Role::create(['name' => 'admin']);

        // Membuat beberapa permission
        $permissions = [
            'add products',
            'edit products',
            'delete products',
            'view products',
        ];

        foreach ($permissions as $permissionName) {
            $permission = Permission::create(['name' => $permissionName]);
            $role->givePermissionTo($permission);
        }

        // Menetapkan role admin ke pengguna
        $adminUser->assignRole($role);
    }
}
