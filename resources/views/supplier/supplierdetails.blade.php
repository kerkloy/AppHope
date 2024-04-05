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
                    <label for="custName" class="input-group-text">Supplier Name:</label>
                    <input type="text" id="supName" class="form-control" value="{{$response->supName ?? ''}}" name="supName">
                </div>
                <div class="input-group mb-3">
                    <label for="supBrand" class="input-group-text">Supplier Brand:</label>
                    <input type="text" id="supBrand" class="form-control" value="{{$response->supBrand ?? ''}}" name="supBrand">
                </div>
                <div class="input-group mb-3">
                    <label for="supBrdType" class="input-group-text">Brand Type:</label>
                    <input type="text" id="supBrdType" class="form-control" value="{{$response->supBrdType ?? ''}}" name="supBrdType">
                </div>
                <div class="input-group mb-3">
                    <label for="supAdd" class="input-group-text">Supplier Address:</label>
                    <input type="text" id="supAdd" class="form-control" value="{{$response->supAdr ?? ''}}" name="supAdr">
                </div>
                <div class="input-group mb-3">
                    <label for="supCon" class="input-group-text">Supplier Contact #:</label>
                    <input id="supCon" data-ids="{{ isset($response->id) ? $response->id : '' }}" type="text" class="form-control supCon" value="{{$response->supCon ?? ''}}" name="supCon">
                </div>

                <button type="submit" class="btn btn-primary">{{isset($response->id) ? 'Update' : 'Save' }}</button>
                <a href="{{url('/supplier')}}" type="button" class="btn btn-danger">Cancel</a>
            </form> 

                </div>
            </div>
            
         </div>
      </div>
   </div>
</div>


@endsection
@section ('script')
@vite(['resources/js/Supplier/supplierdetails.js'])
@endsection