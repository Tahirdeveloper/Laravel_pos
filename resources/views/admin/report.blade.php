@extends('admin.layout')
@section('path1','Dashboard')
@section('url','Dashboard')
@section('container')
<div class="card">
  <!-- /.card-header -->
  @if($id==1)
  @section('page_name','Daily Report')
  @section('path2','Daily Report')
  @elseif($id==7)
  @section('page_name','Weekly Report')
  @section('path2','Weekly Report')
  @elseif($id==30)
  @section('page_name','Monthly Report')
  @section('path2','Monthly Report')
  @endif
  <div class="card-body">
    <table class="table table-striped text-xs">
      <thead class="bg-info">
        <tr>
          <th style="width: 10px">Order#</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($results as $result)
        <tr>
          <td id="4">{{$result->order_id}}</td>
          <td id="1">{{$result->name}}</td>
          <td id="2">{{$result->phone}}</td>
          <td id="3">{{$result->address}}</td>
          <td id="5">{{$result->product_name}}</td>
          <td id="5">{{$result->price}}</td>
          <td id="5">{{$result->qty}}</td>
          <td id="5">{{$result->total}}</td>
        </tr>
        @endforeach
      </tbody>
      <thead>
        <tr>
        <th>SubTotal</th>
          <th>Discount</th>
          <th>Dues</th>
          <th>Change</th>
          <th></th>
          <th></th> 
          <th></th>
          <th></th>
        </tr>
        <tr class="bg-gradient-success">
          <th>{{$allTotal->subTotal}}</th>
          <th>{{$allTotal->allDiscount}}</th>
          <th>{{$allTotal->allDues}}</th>
          <th>{{$allTotal->allChange}}</th>
          <th></th>
          <th></th>
          <th></th>
          <th> <div class="">
            <button type="button" class="btn btn-info" id="print-btn">Print Report</button>
          </div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<script>
 $("#print-btn").on('click', function(e) {
      e.preventDefault();
      $('.card').print({
        	noPrintSelector: "#print-btn",
      });
    });
</script>
@endsection