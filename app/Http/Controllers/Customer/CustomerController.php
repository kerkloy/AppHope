<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Customer::all();

        return view('customer.customerlist', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = [];
        return view('customer.customerdetails',compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Customer = $request -> validate([
            'custName'=> 'required',
            'custCon'=> 'required',
            'custAdr'=> 'required'
        ]);
        $newCustomer = Customer::create($Customer);

        if($newCustomer){
            return response()->json(['success' => 'Customer Added Successfully']);
        }else{
            return response()->json(['success' => 'Customer Insertion Failed']);
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
        $response = DB::table('customers')
        ->where('id',$id)
        ->first();

        // dd($response->id);

        return view('customer.customerdetails',compact('response'));
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
            'custName' => 'required',
            'custCon' => 'required',
            'custAdr' => 'required'
        ]);
        $customer = Customer::find($id);
        
        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }
        $customer->update([
            'custName' => $validatedData['custName'],
            'custCon' => $validatedData['custCon'],
            'custAdr' => $validatedData['custAdr']
        ]);
        return response()->json(['success' => 'Customer updated successfully']);
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
    public function destroy($custID)
    {
        $customer = Customer::find($custID);

        if (!$customer) {
            return response()->json(['error' => 'Customer not found.'], 404);
        }
        $customer->delete();
        return response()->json(['success' => 'Customer successfully deleted!']);
    }
}