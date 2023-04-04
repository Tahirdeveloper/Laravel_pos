@extends('admin.layout')
@section('page_name','Invoice List')
@section('path1','Dashboard')
@section('url','Dashboard')
@section('path2','Sales Record')
@section('container')

<div class="card">
  <!-- /.card-header -->
  <div class="card-body">
    @if(session()->has('delete'))
    <div class="alert alert-success">
      {{session()->get('delete')}}
    </div>
    @endif
    <table class="table table-striped text-xs">
      <thead class="bg-info">
        <tr>
          <th style="width: 10px">Order#</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Date</th>
          <th>SubTotal</th>
          <th>Discount</th>
          <th>Dues</th>
          <th>Change</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customers as $customer)
        <tr>
          <td id="1">{{$customer->invoice_no}}</td>
          <td id="2">{{$customer->name}}</td>
          <td id="3">{{$customer->phone}}</td>
          <td id="4">{{$customer->address}}</td>
          <td id="5">{{$customer->date}}</td>
          <td id="6">{{$customer->subTotal}}</td>
          <td id="7">{{$customer->discount}}</td>
          <td id="8">{{$customer->dues}}</td>
          <td id="9">{{$customer->change}}</td>

          @if($customer->status==1)
          <td><span class="badge bg-success">Paid</span></td>
          @else
          <td><span class="badge bg-warning" data-toggle="modal" data-target="#exampleModalCenter" onclick="getUrl('{{$customer->invoice_no}}')" style="cursor:pointer">Unpaid</span></td>
          @endif
          <td><a href="{{ route('admin.invoice', ['id1' => $customer->customer_id, 'id2' => $customer->invoice_no]) }}">
            <span class="badge bg-info mx-1" data-toggle="modal" data-target="#exampleModalCenter2" style="cursor:pointer">view</span>
          </a>
            <a href="{{route('invoiceList.delete',['id'=>$customer->customer_id])}}"><span class="badge bg-danger">Delete</span></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.invoice Modal -->
  
  <!-- modal2 -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="" method="post" id="payment">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Make Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <label for="name" class="control-label mb-1">Amount</label>
              <input id="name" name="amount" type="text" class="form-control" required placeholder="Enter Amount">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-info">Pay</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>
<script>
  function getUrl(id){
   $('#payment').attr('action', "{{ url('invoiceList/edit/') }}/" + id);
}

</script>
@endsection