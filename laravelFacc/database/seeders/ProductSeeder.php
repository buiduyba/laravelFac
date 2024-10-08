<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Bàn gỗ',
                'price' => '2000000',
                'created_at' => now(),
                'updated_at'=> now()
            ],
            [
                'name' => 'Ghế xoay',
                'price' => '1500000',
                'created_at' => now(),
                'updated_at'=> now()
            ],
            [
                'name' => 'Tủ quần áo',
                'price' => '5000000',
                'created_at' => now(),
                'updated_at'=> now()
            ],
            [
                'name' => 'Giường ngủ',
                'price' => '8000000',
                'created_at' => now(),
                'updated_at'=> now()
            ]
            
        ]);
    }
}
