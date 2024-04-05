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
                    
                <form id="updateForm" method="PUT">
                        @csrf
                        @method ('PUT')

                        <div class="input-group mb-3">
                            <label for="prodName" class="input-group-text">Product Name:</label>
                            <input type="text" id="prodName" class="form-control" value="{{$response->prodName}}" name="prodName">
                        </div>
                        <div class="input-group mb-3">
                            <select  class="form-select" name="prodType" data-placeholder="Select a product type" required aria-label="select example">
                                    @foreach($data['type'] as $type)
                                        <option value="{{$type->supBrdType}}">{{$type->supBrdType}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <select  class="form-select" name="prodBrand" data-placeholder="Select a product type" required aria-label="select example">
                                    @foreach($data['brand'] as $brand)
                                        <option value="{{$brand->supBrand}}">{{$brand->supBrand}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label for="prodSPrice" class="input-group-text">Product Price:</label>
                            <input type="text"  step="0.01" id="prodSPrice" class="form-control" value="{{$response->prodSPrice}}" name="prodSPrice">
                        </div>
                        <div class="input-group mb-3">
                            <label for="prodOPrice" class="input-group-text">Product Price:</label>
                            <input type="text"  step="0.01" id="prodOPrice" class="form-control" value="{{$response->prodOPrice}}" name="prodOPrice">
                        </div>
                        <div class="input-group mb-3">
                            <label for="prodQty" class="input-group-text">Product Quantity:</label>
                            <input type="text"  id="prodQty" class="form-control prodQty" value="{{$response->prodQty}}" name="prodQty">
                        </div>
                        <button type="submit" class="btn btn-primary saveProd" data-savep="{{$response->id}}">Save</button>
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
@vite(['resources/js/Products/productdetails.js'])
@endsection