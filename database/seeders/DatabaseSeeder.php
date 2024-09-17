<?php

namespace Database\Seeders;

use App\Models\Like;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Article;
use App\Models\Campaign;
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

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'slug' => 'admin',
            'password' => Hash::make('admin123')
        ]);

        // Article::factory(50)
        //     ->recycle(
        //         User::factory(10)->create(),
        //     )
        //     ->create();

        // Campaign::factory(50)->create();
        // Like::factory(1000)->create();
    }
}
