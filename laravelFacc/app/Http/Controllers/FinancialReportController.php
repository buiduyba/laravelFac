<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Financial_report;
use App\Models\Sale;
use App\Models\Tax;
use Illuminate\Http\Request;

class FinancialReportController extends Controller
{   
    public function index()
    {
    
        $totalSales = Sale::whereMonth('sale_date', 9)
            ->whereYear('sale_date', 2024)
            ->sum('total');

        $totalExpenses = Expense::whereMonth('expense_date', 9)
            ->whereYear('expense_date', 2024)
            ->sum('amount');

        $vatRate = Tax::where('tax_name', 'VAT')->value('rate');
        $profitBeforeTax = $totalSales - $totalExpenses;
        $taxAmount = $totalSales * $vatRate;
        $profitAfterTax = $profitBeforeTax - $taxAmount;

        Financial_report::create([
            'month' => 9,
            'year' => 2024,
            'total_sales' => $totalSales,
            'totale_expenses' => $totalExpenses,
            'profit_before_tax' => $profitBeforeTax,
            'tax_amount' => $taxAmount,
            'profit_after_tax' => $profitAfterTax
        ]);
        
        return view("welcome", [
            
        ]);
    }
}
