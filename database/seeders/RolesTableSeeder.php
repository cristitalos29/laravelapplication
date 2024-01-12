<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = ['user', 'journalist', 'editor', 'admin'];

        foreach ($roles as $role) {
            DB::table('roles')->insert(['name' => $role]);
        }
    }
}
