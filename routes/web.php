<?php
use App\Http\Controllers\Sale\ModifiedSController;
use App\Http\Controllers\Order\ModifiedController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Supplier\SupplierContoller;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Sale\SaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
// Product
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('product', ProductController::class)->names('product');
Route::resource('customer', CustomerController::class)->names('customer');
Route::resource('supplier', SupplierContoller::class)->names('supplier');
Route::resource('order', OrderController::class)->names('order');
Route::resource('sale', SaleController::class)->names('sale');

Route::get('/sale/print/{id}', [SaleController::class, 'getSaleData']);
Route::post('sale/purchase', [ModifiedSController::class,'store'])->name('sale.purchase');
Route::post('/order/status/{id}', [ModifiedController::class, 'index'])->name('order.status');
// Route::get('/productlist', [ModifiedController::class,'index'])->name('product.list');