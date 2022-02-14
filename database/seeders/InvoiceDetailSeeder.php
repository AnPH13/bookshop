<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<21; $i++){
            DB::table('invoice_details')->insert([
                'product_id' => random_int(1,20),
                'product_total' => random_int(1,20), // admin
                'invoice_id' => random_int(1, 20),
                'status' => random_int(0,1),
                'created_at' => now()
            ]);
        }
    }
}
