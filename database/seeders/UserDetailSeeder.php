<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=1;$i<21;$i++){
            DB::table('user_details')->insert([
                'name' => $faker->name,
                'avatar' => 'anph.jpg',
                'birthday' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')
                ->format('Y-m-d'),
                'number_phone' => $faker->phoneNumber,
                'gender' => random_int(0,1),
                'created_at' => now(),
            ]);
        }
    }
}
