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
        for($i=1; $i<21;$i++){
            DB::table('users')->insert([
                'email' => 'admin'.$i.'@gmail.com',
                'password' => Hash::make('password'), // admin
                'created_at' => now(),
            ]);
        }
    }
}
