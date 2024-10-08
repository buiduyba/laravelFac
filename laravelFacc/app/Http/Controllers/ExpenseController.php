<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function index(){
        $expenses = Expense::selectRaw('SUM(amount) as total_expenses, MONTH(expense_date) as month, YEAR(expense_date) as year')
        ->groupByRaw('MONTH(expense_date), YEAR(expense_date)');
        // ->get();
        $sql = $expenses->toRawSql();
        dd($sql);
        return view("welcome", [
            
        ]);
    }
}
