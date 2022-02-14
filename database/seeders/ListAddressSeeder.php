<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 1; $i < 21; $i++) {
            DB::table('list_addresses')->insert([
                'address' => $faker->address,
                'number_phone' => $faker->phoneNumber,
                'user_id' => $i,
                'created_at' => now(),

            ]);
        }
    }
}
