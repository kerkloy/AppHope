@extends('layouts.hope')

@section('content')

<div class="container-fluid content-inner mt-n5 py-0" id="reportContainer" >
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
                           <th>Brand</th>
                           <th>Type</th>
                           <th>Price</th>
                           <th>Quantity Sold</th>
                           <th>Total Sales</th>
                           <th>Customer Name</th>
                           <th>Date Sold</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody class="text-center">
                     @foreach($response as $item)
                            <tr>
                                <td>{{$item->prodName}}</td>
                                <td>{{$item->prodBrand}}</td>
                                <td>{{$item->prodType}}</td>
                                <td>{{$item->prodSPrice}}</td>
                                <td>{{$item->qtySold}}</td>
                                <td>{{$item->totalSales}}</td>
                                <td>{{$item->custName}}</td>
                                <td>{{$item->soldDate}}</td>
                                <td>
                                 <div class="btn-group" role="group" >
                                    <a href="#" data-deld="{{ $item->id }}" class="btn btn-danger purchDel" id="purchDelete">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                    </a>
                                 </div>

                                 <div class="btn-group" role="group" id="btn-gp">
                                    <a href="#" data-print="{{ $item->id }}" class="btn btn-warning printReciept" >
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.5 8H17V4.5C17 3.67157 16.3284 3 15.5 3H8.5C7.67157 3 7 3.67157 7 4.5V8H4.5C3.67157 8 3 8.67157 3 9.5V15.5C3 16.3284 3.67157 17 4.5 17H7V21.5C7 22.3284 7.67157 23 8.5 23H15.5C16.3284 23 17 22.3284 17 21.5V17H19.5C20.3284 17 21 16.3284 21 15.5V9.5C21 8.67157 20.3284 8 19.5 8ZM15.5 5H8.5C8.22386 5 8 5.22386 8 5.5V8H16V5.5C16 5.22386 15.7761 5 15.5 5ZM16 18H8V20H16V18ZM18.5 16H5.5V10H18.5V16Z" fill="currentColor"/>
                                    </svg>                    
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
</div>

<!-- <div class="reportRow">
    <table>
        <tr>
            <th>TransNo</th>
            <th>Product Name</th>
            <th>Brand</th>
            <th>Type</th>
            <th>Price</th>
            <th>Quantity Sold</th>
            <th>Total Sales</th>
            <th>Customer Name</th>
            <th>Date Sold</th>
        </tr>
        <tr>
            <td id="transNo"></td>
            <td id="pname"></td>
            <td id="pbrand"></td>
            <td id="ptype"></td>
            <td id="pprice"></td>
            <td id="psold"></td>
            <td id="psales"></td>
            <td id="cname"></td>
            <td id="sdate"></td>
        </tr>
    </table>
</div> -->


@endsection

@section('print')

@include('sales.print')
@endsection


@section ('script')
@vite(['resources/js/Sales/saleslist.js','resources/css/sales/saleslist.css'])
@endsection