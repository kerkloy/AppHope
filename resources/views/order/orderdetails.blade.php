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
                    
                <form id="{{$response ? "update" : "create"}}" method="POST">
                        @csrf
                        @if($response)
                            @method('PUT')
                        @endif

                        <div class="input-group mb-3">
                            <label for="prodName" class="input-group-text">Product Name:</label>
                            <input type="text" id="prodName" class="form-control" value="{{$response->prodName ?? ''}}" name="prodName">
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
                            <label for="ordQty" class="input-group-text">Order Quantity:</label>
                            <input type="text"  id="ordQty" class="form-control oQty" value="{{$response->ordQty ?? ''}}" name="ordQty">
                        </div>
                        <div class="input-group mb-3">
                            <label for="prodOPrice" class="input-group-text">Original Price:</label>
                            <input type="text" id="prodOPrice" step="0.01" class="form-control poPrice" value="{{$response->prodOPrice ?? ''}}" name="prodOPrice">
                        </div>
                        <div class="input-group mb-3">
                            <label for="prodSPrice" class="input-group-text">Selling Price:</label>
                            <input type="text"  step="0.01" id="prodSPrice" class="form-control" value="{{$response->prodSPrice ?? ''}}" name="prodSPrice">
                        </div>
                        <div class="input-group mb-3">
                            <label for="totalOrderPrice" class="input-group-text">Total Order Price:</label>
                            <input id="totalOrderPrice" data-ids="{{ isset($response->id) ? $response->id : '' }}" type="text" class="form-control toPrice" value="{{$response->totalOrderPrice ?? ''}}" name="totalOrderPrice" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <label for="ordDate" class="input-group-text">Order Date:</label>
                            <input type="date" id="ordDate" class="form-control" value="{{$response->ordDate ?? ''}}" name="ordDate">
                        </div>
                        <button type="submit" class="btn btn-primary">{{isset($response->id) ? 'Update' : 'Save' }}</button>
                        <a href="{{url('/order')}}" type="button" class="btn btn-danger">Cancel</a>
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
@vite(['resources/js/Orders/orderdetails.js'])
@endsection