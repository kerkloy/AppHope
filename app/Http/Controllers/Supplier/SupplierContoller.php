<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\Supplier;

class SupplierContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Supplier::all();

        return view('supplier.supplierlist', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = [];
        return view('supplier.supplierdetails',compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Supplier = $request -> validate([
            'supName'=> 'required',
            'supBrand'=> 'required',
            'supBrdType'=> 'required',
            'supAdr'=> 'required',
            'supCon'=> 'required'
        ]);
        $newSupplier = Supplier::create($Supplier);

        if($newSupplier){
            return response()->json(['success' => 'Supplier Added Successfully']);
        }else{
            return response()->json(['success' => 'Supplier Insertion Failed']);
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
        $response = DB::table('suppliers')
        ->where('id',$id)
        ->first();

        // dd($response->id);

        return view('supplier.supplierdetails',compact('response'));
    
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
            'supName'=> 'required',
            'supBrand'=> 'required',
            'supBrdType'=> 'required',
            'supAdr'=> 'required',
            'supCon'=> 'required'
        ]);
        $customer = Supplier::find($id);
        
        if (!$customer) {
            return response()->json(['error' => 'Supplier not found'], 404);
        }
        $customer->update([
            'supName' => $validatedData['supName'],
            'supBrand' => $validatedData['supBrand'],
            'supBrdType' => $validatedData['supBrdType'],
            'supAdr' => $validatedData['supAdr'],
            'supCon' => $validatedData['supCon']
        ]);
        return response()->json(['success' => 'Supplier Updated Successfully']);
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
    public function destroy($supID)
    {
        $supplier = Supplier::find($supID);

        if (!$supplier) {
            return response()->json(['error' => 'Supplier not found.'], 404);
        }
        $supplier->delete();
        return response()->json(['success' => 'Supplier Successfully Deleted!']);
    }
}
