<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<21; $i++){
            DB::table('products')->insert([
                'name' => Str::random(7),
                'price' => random_int(10000, 20000), // admin
                'total' =>random_int(1,20),
                'total_sold' => random_int(1,20),
                'type' => Str::random(7),
                'provider' => Str::random(7),
                'author' => 'anph',
                'description' => Str::random(30),
                'created_at' => now()
            ]);
        }
    }
}
