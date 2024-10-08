<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FinancialReportController;
use App\Http\Controllers\SaleController;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('1', function () {
//     $query = DB::table('users')
//         ->join('orders', 'users.id', '=', 'orders.user_id')
//         ->select(
//             'users.name',
//             DB::raw("SUM(order.amount) as total_spent")
//         )
//         ->groupBy('users.name')
//         ->having('total_spent', '>', '1000');
//     $sql = $query->toRawSql();
//     dd($sql);
// });
// Route::get('2', function () {
//     $query = DB::table('orders')
//         ->selectRaw('DATE(order_date) AS date, COUNT(*) AS orders_count, SUM(total_amount) AS total_sales')
//         ->whereBetween('order_date', ['2024-01-01', '2024-09-30'])
//         ->groupByRaw('DATE(order_date)');
//     $sql = $query->toRawSql();
//     dd($sql);
// });
// Route::get('3', function () {
//     $query = DB::table('products')
//     ->select('products.product_name')
//     ->whereNotExists(function ($query1) {
//         $query1->select(DB::raw(1))
//               ->from('orders')
//               ->whereColumn('orders.product_id', 'products.id');
//     });
//     $sql = $query->toRawSql();
//     dd($sql);
// });
// Route::get('4', function () {
//     $query = DB::with('sales_cte as', function ($query1) {
//         $query1->select('product_id', DB::raw('SUM(quantity) AS total_sold'))
//               ->from('sales')
//               ->groupBy('product_id');
//     })
//     ->select('products.product_name', 'sales.total_sold')
//     ->from('products')
//     ->join('sales_cte as s', 'products.id', '=', 'sales.product_id')
//     ->where('sales.total_sold', '>', 100);
//     $sql = $query->toRawSql();
//     dd($sql);
// });
// Route::get('5', function () {
//     $query = DB::table('users')
//         ->join('orders', 'users.id', '=', 'orders.user_id')
//         ->join('order_items', 'orders.id', '=', 'order_items.order_id')
//         ->join('products', 'order_items.product_id', '=', 'products.id')
//         ->select('users.name', 'products.product_name', 'orders.order_date')
//         ->where('orders.order_date', '>=', Carbon::now()->subDays(30));
//     // Carbon là package giúp xử lý ngày giờ 
//     $sql = $query->toRawSql();
//     dd($sql);
// });
// Route::get('6', function () {
//     $query = DB::table('orders')
//         ->join('order_items', 'orders.id', '=', 'order_items.order_id')
//         ->select(
//             DB::raw("DATE_FORMAT(orders.order_date, '%Y-%m') AS order_month"),
//             DB::raw("SUM(order_items.quantity * order_items.price) AS total_revenue")
//         )
//         // Dùng DB::raw() khi thực hiện các hàm querybuilder k hỗ trợ: SUM(), AVG(), COUNT(),DATE_FORMAT(),IF()
//         ->where('order.status', 'completed')
//         ->groupBy('order_month')
//         ->orderBy('order_month', 'desc');
//     $sql = $query->toRawSql();
//     dd($sql);
// });
// Route::get('7', function () {
//     $query = DB::table('products')
//         ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
//         ->select('products.product_name')
//         ->whereNull('order_items.product_id');
//     // whereNULL() xác minh giá trị cột đã cho là NULL
//     $sql = $query->toRawSql();
//     dd($sql);
// });
// Route::get('8', function () {
//     $query1 = DB::table('order_items')
//         ->select(
//             'product_id',
//             DB::raw("SUM(quantity * price) AS total")
//         )
//         ->groupBy('product_id');
//     $query2 = DB::table('products')
//         ->joinSub($query1, 'order_items', function (JoinClause $join) {
//             $join->on('products.id', '=', 'order_items.product_id');
//         })
//         ->groupBy('products.category_id', 'products.product_name')
//         ->orderBy('max_revenue', 'desc');
//     $sql = $query2->toRawSql();
//     dd($sql);
// });
// Route::get('9', function () {
//     $subQuery = DB::table('order_items')
//         ->select(DB::raw('SUM(quantity * price) AS total'))
//         ->groupBy('order_id');
//     $query = DB::table('orders')
//         ->join('users', 'users.id', '=', 'orders.user_id')
//         ->join('order_items', 'orders.id', '=', 'order_items.order_id')
//         ->select(
//             'orders.id',
//             'users.name',
//             'orders.order_date',
//             DB::raw('SUM(order_items.quantity * order_items.price) AS total_value')
//         )
//         ->groupBy('orders.id', 'users.name', 'orders.order_date')
//         ->having('total_value', '>', DB::raw("({$subQuery->toSql()})"))
//         ->mergeBindings($subQuery);
//     $sql = $query->toRawSql();
//     dd($sql);
// });
// Route::get('10', function () {
//     $subQuery = DB::table('order_items')
//         ->select('products.product_name', DB::raw('SUM(order_items.quantity) as total_sold'))
//         ->join('products', 'order_items.product_id', '=', 'products.id')
//         ->whereColumn('products.category_id', 'p.category_id')
//         //whereColumn() giúp xác minh xem 2 cột có bằng nhau không
//         ->select(DB::raw('SUM(order_items.quantity) as total_sold'))
//         ->groupBy('products.product_name');

//     $query = DB::table('products as p')
//         ->select('p.product_name', 'p.category_id', DB::raw('SUM(order_items.quantity) as total_sold'))
//         ->join('order_items', 'order_items.product_id', '=', 'p.id')
//         ->groupBy('p.product_name')
//         ->having('total_sold', '=', DB::raw("({$subQuery->toSql()})")) // Lồng subquery
//         ->mergeBindings($subQuery); // Gộp các bindings của subquery
//     $sql = $query->toRawSql();
//     dd($sql);
// // });
// Route::get('tong_doanh_thu', [SaleController::class,'index']);
// Route::get('tong_chi_phi', [ExpenseController::class,'index']);
// Route::get('bao_cao', [FinancialReportController::class,'index']);
Route::resource('employee', EmployeeController::class);
Route::delete('employee/{employee}/forceDestroy', [EmployeeController::class,'forceDestroy'])
->name('employee.forceDestroy');
Route::middleware(['auth'])->group(function(){
    Route::resource('customer', CustomerController::class);
    Route::delete('customer/{customer}/forceDestroy', [CustomerController::class,'forceDestroy'])
    ->name('customer.forceDestroy');
});

Route::get('login', function(){
    echo "Đây là trang login";
    die;
})->name('login');