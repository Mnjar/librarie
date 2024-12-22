<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Membuat 3 user dummy
        User::create([
            'name' => 'Admin User',
            'username' => 'adminuser',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // User::create([
        //     'name' => 'Fajar',
        //     'username' => 'fajar',
        //     'email' => 'fajar@gmail.com',
        //     'password' => Hash::make('password123'),
        //     'role' => 'user',
        // ]);
    }
}
