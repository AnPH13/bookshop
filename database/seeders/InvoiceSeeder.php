<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<12; $i++){
            DB::table('invoices')->insert([
                'user_id' => random_int(1,2),
                'payment_methods' => random_int(1,2), // admin
                'total_amount' => random_int(0, 20),
                'status' => random_int(1,5),
                'created_at' => now()
            ]);
        }
    }
}
