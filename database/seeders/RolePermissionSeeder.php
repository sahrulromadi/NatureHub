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
            'View Articles',
            'Create Articles',
            'Edit Articles',
            'Manage Articles',
            'Manage Camapaigns',
        ];

        // Create permission
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $roles = [
            'Super Admin' => [],
            'Editor' => [
                'View Articles',
                'Create Articles',
                'Edit Articles'
            ],
            'Writer' => [
                'View Articles',
                'Create Articles',
                'Edit Articles'
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
