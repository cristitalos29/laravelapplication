<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create a user with the default role 'user'
        DB::table('users')->insert([
            'username' => 'example_user',
            'name' => 'Example User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1, // Assuming 'user' has ID 1 in the roles table
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
