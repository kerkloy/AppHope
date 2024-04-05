<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Product::all();
        return view('Product.productlist',compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = DB::table('products')
        ->where('id',$id)
        ->first();

        $data['brand'] = DB::select('SELECT DISTINCT(supBrand) FROM suppliers');
        $data['type'] = DB::select('SELECT DISTINCT(supBrdType) FROM suppliers');

        return view('product.productdetails',compact('response','data'));
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
        try{
            $validatedData = $request->validate([
                'prodName' => 'required',
                'prodType' => 'required',
                'prodBrand' => 'required',
                'prodSPrice' => 'required|numeric',
                'prodOPrice' => 'required|numeric',
                'prodQty' => 'required|integer|min:1'
            ]);

            
            $product = Product::find($id);
            
            if (!$product) {
                return response()->json(['error' => 'Product not found'], 404);
            }
            $product->update([
                'prodName' => $validatedData['prodName'],
                'prodType' => $validatedData['prodType'],
                'prodBrand' => $validatedData['prodBrand'],
                'prodSPrice' => $validatedData['prodSPrice'],
                'prodOPrice' => $validatedData['prodOPrice'],
                'prodQty' => $validatedData['prodQty']
            ]);
            return response()->json(['success' => 'Product updated successfully']);
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
    public function destroy($prodID)
    {
        $order = Product::find($prodID);

        if (!$order) {
            return response()->json(['error' => 'Product not found.'], 404);
        }
        $order->delete();
        return response()->json(['success' => 'Product successfully deleted!']);
    }
}
