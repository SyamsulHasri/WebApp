<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Free-User',
            'email' => 'free@gmail.com',
            'phone' => '0123456789',
            'is_subscription' => 0,
            'password' => Hash::make('123123123'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Premium-User',
            'email' => 'premium@gmail.com',
            'phone' => '0123456789',
            'is_subscription' => 1,
            'password' => Hash::make('123123123'),
        ]);
    }
}
