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
                    <label for="custName" class="input-group-text">Customer Name:</label>
                    <input type="text" id="custName" class="form-control" value="{{$response->custName ?? ''}}" name="custName">
                </div>
                <div class="input-group mb-3">
                    <label for="custCon" class="input-group-text">Customer Contact#:</label>
                    <input type="text" id="custCon" class="form-control" value="{{$response->custCon ?? ''}}" name="custCon">
                </div>
                <div class="input-group mb-3">
                    <label for="custAdr" class="input-group-text">Customer Address:</label>
                    <input id="custAdr" data-ids="{{ isset($response->id) ? $response->id : '' }}" type="text" class="form-control custAdr" value="{{$response->custAdr ?? ''}}" name="custAdr">
                </div>
                <button type="submit" class="btn btn-primary">{{isset($response->id) ? 'Update' : 'Save' }}</button>
                <a href="{{url('/customer')}}" type="button" class="btn btn-danger">Cancel</a>
            </form> 

                </div>
            </div>
            
         </div>
      </div>
   </div>
</div>


@endsection
@section ('script')
@vite(['resources/js/Customer/customerdetails.js'])
@endsection