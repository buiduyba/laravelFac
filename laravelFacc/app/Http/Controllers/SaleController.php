<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index(){
        $sales = DB::table('sales')
        ->selectRaw('SUM(total) as total_sales, MONTH(sale_date) as month, YEAR(sale_date) as year')
        ->groupByRaw('MONTH(sale_date), YEAR(sale_date)');
        // ->get();
        $sql = $sales->toRawSql();
        dd($sql);
        return view("welcome", [
            
        ]);
    }
}
