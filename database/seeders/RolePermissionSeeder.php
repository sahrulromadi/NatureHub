<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Deklarasi permissions
        $permissions = [
            'view articles',
            'create articles',
            'edit articles',
            'manage articles',
            'manage campaigns',
        ];

        // Create permission
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $roles = [
            'super admin' => [],
            'editor' => [
                'view articles',
                'create articles',
                'edit articles'
            ],
            'writer' => [
                'view articles',
                'create articles',
                'edit articles'
            ],
        ];

        // Create role
        foreach ($roles as $role => $permissions) {
            $roleInstance = Role::firstOrCreate(['name' => $role]);

            // Berikan permission ke role
            $roleInstance->syncPermissions($permissions);
        }
    }
}
