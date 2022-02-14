<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<21; $i++){
            DB::table('reviews')->insert([
                'message' => Str::random(20), // admin
                'image' => $i.'.jpg',
                'star' => random_int(1,5),
                'created_at' => now()
            ]);
        }
    }
}
