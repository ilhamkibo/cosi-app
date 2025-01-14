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
        // Membuat pengguna superadmin
        $superAdminUser = User::create([
            'name' => 'Ilham Prima',
            'email' => 'ilham.ilam59@gmail.com',
            'password' => bcrypt('Ilhamazz123*'),
        ]);

        // Membuat peran superadmin
        $superAdminRole = Role::create(['name' => 'superadmin']);

        // Daftar permission dengan kategori
        $permissions = [
            'products' => ['add', 'edit', 'delete', 'view'],
            'articles' => ['add', 'edit', 'delete', 'view'],
            'categories' => ['add', 'edit', 'delete', 'view'],
            'collections' => ['add', 'edit', 'delete', 'view'],
            'partners' => ['add', 'edit', 'delete', 'view'],
            'users' => ['add', 'edit', 'delete', 'view'],
        ];

        // Membuat peran dan permission sesuai kategori
        foreach ($permissions as $module => $actions) {
            foreach ($actions as $action) {
                $permissionName = "{$action} {$module}";
                $permission = Permission::create(['name' => $permissionName]);

                // Menetapkan permission ke peran modul
                $roleName = "{$module} manager";
                $role = Role::firstOrCreate(['name' => $roleName]);
                $role->givePermissionTo($permission);

                // Menetapkan permission ke superadmin
                $superAdminRole->givePermissionTo($permission);
            }
        }

        // Menetapkan role superadmin ke pengguna
        $superAdminUser->assignRole($superAdminRole);
    }
}
