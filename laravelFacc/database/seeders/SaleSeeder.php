<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales')->insert([
            [
                'product_id' => 1,
                'quantity' => 3,
                'price' => 2000000,
                'tax' => 600000,
                'total'=> 6600000,
                'sale_date' => date('2024-09-15'),
                'created_at' => now(),
                'updated_at'=> now()
            ],
            [
                'product_id' => 2,
                'quantity' => 2,
                'price' => 1500000,
                'tax' => 300000,
                'total'=> 3300000,
                'sale_date' => date('2024-09-16'),
                'created_at' => now(),
                'updated_at'=> now()
            ],
            [
                'product_id' => 3,
                'quantity' => 1,
                'price' => 5000000,
                'tax' => 500000,
                'total'=> 5500000,
                'sale_date' =>  date('2024-09-18'),
                'created_at' => now(),
                'updated_at'=> now()
            ],
            [
                'product_id' => 4,
                'quantity' => 2,
                'price' => 8000000,
                'tax' => 1600000,
                'total'=> 17600000,
                'sale_date' =>  date('2024-09-20'),
                'created_at' => now(),
                'updated_at'=> now()
            ]
        ]);
    }
}
