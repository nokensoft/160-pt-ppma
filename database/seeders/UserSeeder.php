<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@ppma-papua.org',
            'password' => 'admin123',
            'role' => 'admin_master',
        ]);

        User::create([
            'name' => 'Penulis PPMA',
            'email' => 'penulis@ppma-papua.org',
            'password' => 'penulis123',
            'role' => 'penulis',
        ]);
    }
}
