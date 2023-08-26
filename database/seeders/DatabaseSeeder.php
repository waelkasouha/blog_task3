<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Admin 1',
            'status' => 'admin',
            'email' => 'admin1@gmail.com',
            'password' => '12345678'
        ]);

        User::factory()->create([
            'name' => 'Auther 1',
            'status' => 'auther',
            'email' => 'auther1@gmail.com',
            'password' => '12345678'
        ]);

        Category::factory()->create([
            'name' => 'category1',
        ]);
        Category::factory()->create([
            'name' => 'category2',
        ]);
        Category::factory()->create([
            'name' => 'category3',
        ]);
        Category::factory()->create([
            'name' => 'category4',
        ]);

        Tag::factory()->create([
            'name' => 'tag1',
        ]);
        Tag::factory()->create([
            'name' => 'tag2',
        ]);
        Tag::factory()->create([
            'name' => 'tag3',
        ]);
        Tag::factory()->create([
            'name' => 'tag4',
        ]);

    }
}
