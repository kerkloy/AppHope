@extends('layouts.hope')

@section('content')

<div class="conatiner-fluid content-inner mt-n5 py-0">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table id="datatable" class="table table-striped" data-toggle="data-table">
                     <thead class="text-center">
                        <tr>
                           <th>Product Name</th>
                           <th>Type</th>
                           <th>Brand</th>
                           <th>Order Qty</th>
                           <th>Original Price</th>
                           <th>Selling Price</th>
                           <th>Total Price</th>
                           <th>Order Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody class="text-center">
                     @foreach($response as $item)
                     @csrf
                            <tr>
                                <td>{{$item->prodName}}</td>
                                <td>{{$item->prodType}}</td>
                                <td>{{$item->prodBrand}}</td>
                                <td>{{$item->ordQty}}</td>
                                <td>{{$item->prodOPrice}}</td>
                                <td>{{$item->prodSPrice}}</td>
                                <td>{{$item->totalOrderPrice}}</td>
                                <td>{{$item->ordDate}}</td>

                                <td>
                                    <div class="btn-group" role="group">
                                       <a href="{{route('order.show',[$item->id])}}" class="btn btn-primary ordEdit"id="cusEdit">
                                       <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M13.7476 20.4428H21.0002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.78 3.79479C13.5557 2.86779 14.95 2.73186 15.8962 3.49173C15.9485 3.53296 17.6295 4.83879 17.6295 4.83879C18.669 5.46719 18.992 6.80311 18.3494 7.82259C18.3153 7.87718 8.81195 19.7645 8.81195 19.7645C8.49578 20.1589 8.01583 20.3918 7.50291 20.3973L3.86353 20.443L3.04353 16.9723C2.92866 16.4843 3.04353 15.9718 3.3597 15.5773L12.78 3.79479Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M11.021 6.00098L16.4732 10.1881" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg> 
                                       </a>
                                       <a href="#" data-deld = '{{$item->id}}' class="btn btn-danger ordDel" id="custDelete">
                                       <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>     
                                       </a>
                                       <a href="" data-order-id="{{ $item->id }}" data-status="{{ $item->status }}" class="btn{{ $item->status == 0 ? ' btn-info' : ' btn-warning' }} status" id="status" @if($item->status == 1) disabled @endif>
                                          @if($item->status == 0)
                                             <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path fill-rule="evenodd" clip-rule="evenodd" d="M21.25 12.0005C21.25 17.1095 17.109 21.2505 12 21.2505C6.891 21.2505 2.75 17.1095 2.75 12.0005C2.75 6.89149 6.891 2.75049 12 2.75049C17.109 2.75049 21.25 6.89149 21.25 12.0005Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                   <path d="M15.4316 14.9429L11.6616 12.6939V7.84692" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                             </svg>
                                          @else
                                             <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                   <path d="M8.43994 12.0002L10.8139 14.3732L15.5599 9.6272" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                             </svg>
                                          @endif
                                       </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach 
                     </tbody>
                     
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection


@section ('script')
@vite(['resources/js/Orders/orderlist.js'])
@endsection