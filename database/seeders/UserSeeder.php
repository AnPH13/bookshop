<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'), // admin
        ]);
        DB::table('users')->insert([
            'email' => 'staff@gmail.com',
            'password' => Hash::make('password'), // admin
        ]);
    }
}
