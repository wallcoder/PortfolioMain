<?php

namespace Database\Seeders;
use App\Models\Post; 

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Import Hash

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Biaka Vaiphei',
            'email' => 'biakropuia4@gmail.com',
            'password' => Hash::make('Wallflower#444'),
        ]);

        // Post::factory()->count(2)->create();

    }
}
