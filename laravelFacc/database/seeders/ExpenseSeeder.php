<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('expenses')->insert([
            [
                'description' => 'Nhập hàng tháng 9',
                'amount' => 5000000,
                'expense_date' => date('2024-09-05'),
                'created_at' => now(),
                'updated_at'=> now()
            ],
            [
                'description' => 'Chi phí vận chuyển',
                'amount' => 1000000,
                'expense_date' => date('2024-09-10'),
                'created_at' => now(),
                'updated_at'=> now()
            ],
            [
                'description' => 'Lương nhân viên',
                'amount' => 1200000,
                'expense_date' => date('2024-09-30'),
                'created_at' => now(),
                'updated_at'=> now()
            ],

        ]);
    }
}
