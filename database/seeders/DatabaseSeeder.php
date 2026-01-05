<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ===== Categories =====
        $electronics = Category::create([
            'name' => 'Электроника',
        ]);

        $computers = Category::create([
            'name' => 'Компьютеры',
        ]);

        $phones = Category::create([
            'name' => 'Смартфоны',
        ]);

        // ===== Products =====
        Product::create([
            'category_id' => $electronics->id,
            'name' => 'MacBook Air M2',
            'year' => 2023,
            'price' => 1200,
        ]);

        Product::create([
            'category_id' => $electronics->id,
            'name' => 'iPad Pro 11',
            'year' => 2022,
            'price' => 999,
        ]);

        Product::create([
            'category_id' => $computers->id,
            'name' => 'Dell XPS 15',
            'year' => 2023,
            'price' => 1800,
        ]);

        Product::create([
            'category_id' => $computers->id,
            'name' => 'HP Pavilion',
            'year' => 2021,
            'price' => 850,
        ]);

        Product::create([
            'category_id' => $phones->id,
            'name' => 'iPhone 15 Pro',
            'year' => 2024,
            'price' => 1300,
        ]);

        Product::create([
            'category_id' => $phones->id,
            'name' => 'Samsung Galaxy S24',
            'year' => 2024,
            'price' => 1100,
        ]);

        // ===== Admin User =====
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin'),
        ]);
    }
}
