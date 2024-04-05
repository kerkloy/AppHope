<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\Order;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Order::all();

        return view('order.orderlist', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = [];
        $data['brand'] = DB::select('SELECT DISTINCT(supBrand) FROM suppliers');
        $data['type'] = DB::select('SELECT DISTINCT(supBrdType) FROM suppliers');
    
        return view('order.orderdetails',compact('response','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
            $orderData = $request->validate([
                'prodName' => 'required',
                'prodType' => 'required',
                'prodBrand' => 'required',
                'ordQty' => 'required|integer|min:1',
                'prodOPrice' => 'required|numeric',
                'prodSPrice' => 'required|numeric',
                'totalOrderPrice' => 'required|numeric',
                'ordDate' => 'required'
            ]);

            $newOrder =  Order::create($orderData);

            //return $orderData;

        } catch (\Exception $e) {
            return response()->json(['error' => 'Order Insertion Failed: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = DB::table('orders')
        ->where('id',$id)
        ->first();

        $data['brand'] = DB::select('SELECT DISTINCT(supBrand) FROM suppliers');
        $data['type'] = DB::select('SELECT DISTINCT(supBrdType) FROM suppliers');

        // dd($response->id);

        return view('order.orderdetails',compact('response','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
       try{
        $validatedData = $request->validate([
            'prodName' => 'required',
            'prodType' => 'required',
            'prodBrand' => 'required',
            'ordQty' => 'required|integer|min:1',
            'prodOPrice' => 'required|numeric',
            'prodSPrice' => 'required|numeric',
            'totalOrderPrice' => 'required|numeric',
            'ordDate' => 'required'
        ]);
        $order = Order::find($id);
        
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        $order->update([
            'prodName' => $validatedData['prodName'],
            'prodType' => $validatedData['prodType'],
            'prodBrand' => $validatedData['prodBrand'],
            'ordQty' => $validatedData['ordQty'],
            'prodOPrice' => $validatedData['prodOPrice'],
            'prodSPrice' => $validatedData['prodSPrice'],
            'totalOrderPrice' => $validatedData['totalOrderPrice'],
            'ordDate' => $validatedData['ordDate']
        ]);
        return response()->json(['success' => 'Order updated successfully']);
       }catch(\Exception $e){

        return response()->json(['success' => $e->getMessage()]);

       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ordID)
    {
        $order = Order::find($ordID);

        if (!$order) {
            return response()->json(['error' => 'Order not found.'], 404);
        }
        $order->delete();
        return response()->json(['success' => 'Order successfully deleted!']);
    }
}
