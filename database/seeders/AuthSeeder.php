<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create([
            'email' => 'admin@admin.com',
            'password' => 'admin123',
            'otp' => null,
            'role' => 'admin',
        ]);
        User::Create([
            'email' => 'editor@editor.com',
            'password' => 'editor123',
            'otp' => null,
            'role' => 'editor',
        ]);
    }
}
