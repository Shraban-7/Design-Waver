<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'status' => 'active',

            ],
            // AgentsTable
            [
                'name' => 'Agent',
                'email' => 'agent@agent.com',
                'password' => bcrypt('agent'),
                'role' => 'agent',
                'status' => 'active',

            ],
            // User Table
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => bcrypt('12345678'),
                'role' => 'user',
                'status' => 'active',

            ],
        ]);


    }
}
