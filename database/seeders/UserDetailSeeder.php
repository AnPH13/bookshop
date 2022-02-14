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
        DB::table('user_details')->insert([
            'name' => 'Phạm Hoàng An',
            'avatar' => 'anph.jpg',
            'birthday' => '2001-02-14',
            'number_phone' => '0886782337',
            'gender' => 1,

        ]);
        DB::table('user_details')->insert([
            'name' => 'Phạm Hoàng An',
            'avatar' => 'anph.jpg',
            'birthday' => '2001-02-14',
            'number_phone' => '0886782337',
            'gender' => 1,
        ]);
    }
}
