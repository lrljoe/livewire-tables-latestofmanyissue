<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OneUserTwoPurchasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'testuser@testuser.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('purchases')->insert([
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('purchases')->insert([
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
