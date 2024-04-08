@extends('layouts.hope')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  
               </div>
               <div class="card-body">
                    
                <form id="salesForm" method="POST">
                        @csrf
                        @method ('POST')

                        <div class="input-group mb-3 quantity2" data-quan="{{$response->prodQty}}">
                            <input type="hidden" id="prodID" class="form-control" value="{{$response->id}}" name="prodID">
                        </div>
                        <div class="input-group mb-3">
                            <label for="prodName" class="input-group-text">Product Name:</label>
                            <input type="text" id="prodName" class="form-control" value="{{$response->prodName}}" name="prodName">
                        </div>
                        <div class="input-group mb-3">
                            <label for="prodBrand" class="input-group-text">Product Brand:</label>
                            <input type="text" id="prodBrand" class="form-control" value="{{$response->prodBrand}}" name="prodBrand">
                        </div>
                        <div class="input-group mb-3">
                            <select  class="form-select" name="prodType" data-placeholder="Select a product type" required aria-label="select example">
                                    @foreach($data['type'] as $type)
                                        <option value="{{$type->supBrdType}}">{{$type->supBrdType}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label for="prodSPrice" class="input-group-text">Product Price:</label>
                            <input type="text"  step="0.01" id="prodSPrice" class="form-control sPrice" value="{{$response->prodSPrice}}" name="prodSPrice" readonly>
                        </div>
                        <div class="input-group mb-3">
                            
                            <input type="hidden"  step="0.01" id="prodOPrice" class="form-control" value="{{$response->prodOPrice}}" name="prodOPrice">
                        </div>
                        <div class="input-group mb-3">
                            <label for="qtySold" class="input-group-text">Product Quantity:</label>
                            <input type="text"  id="qtySold" class="form-control soldQty" name="qtySold">
                        </div>
                        <div class="input-group mb-3">
                            <select  class="form-select" name="custName" data-placeholder="Select a product type" required aria-label="select example">
                                    @foreach($data['name'] as $name)
                                        <option value="{{$name->custName}}">{{$name->custName}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label for="totalSales" class="input-group-text">Total Price:</label>
                            <input type="text"  id="totalSales" class="form-control tPrice" name="totalSales" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <label for="soldDate" class="input-group-text">Sold Date:</label>
                            <input type="date" id="soldDate" class="form-control" name="soldDate">
                        </div>
                        <button type="submit" class="btn btn-success btnCheck" data-purch="{{$response->id}}">Checkout</button>
                        <a href="{{url('/product')}}" type="button" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div> 
            </div>  
         </div>
      </div>
   </div>
</div>


@endsection
@section ('script')
@vite(['resources/js/Sales/salesdetails.js'])
@endsection