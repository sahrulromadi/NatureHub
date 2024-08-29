<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class
        ]);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'slug' => 'admin',
            'password' => Hash::make('admin123')
        ]);
        $admin->assignRole('super admin');

        $writers = User::factory(10)->create();
        foreach ($writers as $writer) {
            $writer->assignRole('writer');
        }

        Article::factory(50)
            ->recycle($writer)
            ->create();
    }
}
