<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Users
        \App\Models\User::truncate();
        \App\Models\User::factory(3)->create();
        
        // Categories
        Category::truncate();
        Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Category::create([
            'name' => 'Sports',
            'slug' => 'sports'
        ]);

        // Articles
        \App\Models\Article::truncate();

    }
}
