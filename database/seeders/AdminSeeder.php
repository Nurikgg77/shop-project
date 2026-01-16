<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Создаём админа
        User::create([
            'name' => 'Admin',
            'email' => 'admin@nurik.com',
            'password' => Hash::make('123456'),
            'is_admin' => true, // убедись, что есть поле is_admin в users
        ]);
    }
}
