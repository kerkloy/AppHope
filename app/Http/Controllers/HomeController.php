<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\Sale;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   // Retrieve total sales
        $totalSales = Sale::sum('totalSales');
        // Retrieve total costs
        $totalCost = Order::whereNull('deleted_at')->sum('totalOrderPrice');
        // Retrieve all sales including related product data
        $totalProfit = Sale::selectRaw('SUM(totalSales - (prodOprice * qtySold)) as totalProfit')->value('totalProfit');
        $totalCustomers = Customer::count();
        $totalProducts = Product::count();
        $totalPurchase = Sale::count();

        
        // Retrieve sales today
        $today = Carbon::today();

        $incomeToday = Sale::whereDate('soldDate', $today)
        ->sum('totalSales');


        return view('home', ['totalSales' => $totalSales, 
        'totalProfit' => $totalProfit, 
        'totalCost' => $totalCost,
        'incomeToday' => $incomeToday,
        'totalCustomers' => $totalCustomers,
        'totalProducts' => $totalProducts,
        'totalPurchase' => $totalPurchase]);
    }

    public function logout() {
        return redirect('login');
    }
}
