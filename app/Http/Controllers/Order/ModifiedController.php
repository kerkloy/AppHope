<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\Order;
use App\Models\Product;

class ModifiedController extends Controller
{
    // public function index($id){
    //     $order = DB::table('orders')
    //     ->where('id', $id) 
    //     ->update(['status' => '1']);

    //     if($order){
    //         return response()->json(['success' => 'Product order success']);
    //     }else{
    //         return response()->json(['failed'=> 'Cant order existing product']);
    //     }
    // }

    // public function index(request $request, $id) {
    //     // Update the status of the order to 1
    //     $order = DB::table('orders')
    //         ->where('id', $id) 
    //         ->update(['status' => '1']);
    
    //     if ($order) {
    //         // Retrieve the order data
    //         $orderData = DB::table('orders')->where('id', $id)->first();
    
    //         // Create a new product using the order data
    //         Product::create([
    //             'prodName' => $orderData->prodName,
    //             'prodType' => $orderData->prodType,
    //             'prodBrand' => $orderData->prodBrand,
    //             'prodQty' => $orderData->ordQty,
    //             'prodSPrice' => $orderData->prodSPrice
    //         ]);
    //         return response()->json(['success' => 'Product order success']);
    //     } else {
    //         return response()->json(['failed' => 'Failed to update order status']);
    //     }
    // }

    public function index(Request $request, $id) {
        // Update the status of the order to 1
        $order = DB::table('orders')
            ->where('id', $id) 
            ->update(['status' => '1']);
    
        if ($order) {
            // Retrieve the order data
            $orderData = DB::table('orders')->where('id', $id)->first();
            
            // Check if product exists in products table
            $existingProduct = Product::where('prodName', $orderData->prodName)->first();
            
            if ($existingProduct) {
                // Update existing product quantity
                $existingProduct->prodQty += $orderData->ordQty;
                $existingProduct->save();
            } else {
                // Create a new product using the order data
                Product::create([
                    'prodName' => $orderData->prodName,
                    'prodType' => $orderData->prodType,
                    'prodBrand' => $orderData->prodBrand,
                    'prodQty' => $orderData->ordQty,
                    'prodSPrice' => $orderData->prodSPrice,
                    'prodOPrice' => $orderData->prodOPrice
                ]);
            }
            
            return response()->json(['success' => 'Product order success']);
        } else {
            return response()->json(['failed' => 'Failed to update order status']);
        }
    }
    
    
}
