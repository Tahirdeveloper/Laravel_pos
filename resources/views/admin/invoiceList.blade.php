@extends('admin.layout')
@section('page_name','Invoice List')
@section('path1','Dashboard')
@section('url','Dashboard')
@section('path2','Sales Record')
@section('container')
<div class="col-sm-12 col-md-4 mb-2">
  <div class="input-group">
    <input type="search" class="form-control" id="search" onkeyup="myFunction()" placeholder="Search By Name or Order id">
    <div class="input-group-append">
      <button type="submit" class="btn btn-default">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
</div>
<div class="card">
  <!-- /.card-header -->
  <div class="card-body">
    @if(session()->has('delete'))
    <div class="alert alert-success">
      {{session()->get('delete')}}
    </div>
    @endif
    <table class="table table-striped text-sm table_sm table_md table_lg">
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
      <tbody id="myTable">
        @foreach($customers as $customer)
        <tr>
          <td id="1">{{$customer->invoice_no}}</td>
          <td id="2">{{$customer->customer->name}}</td>
          <td id="3">{{$customer->customer->phone}}</td>
          <td id="4">{{$customer->customer->address}}</td>
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
          <td>
            <div>
              <a href="{{ route('admin.invoice', ['id1' => $customer->customer_id, 'id2' => $customer->invoice_no]) }}">
                <span class="badge bg-info mx-1" data-toggle="modal" data-target="#exampleModalCenter2" style="cursor:pointer"><i class="fas fa-eye"></i></span>
              </a>
              <a href="{{route('invoiceList.delete',['id'=>$customer->order_id])}}"><span class="badge bg-danger"><i class="fas fa-trash"></i></span></a>
            </div>
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
  function getUrl(id) {
    $('#payment').attr('action', "{{ url('invoiceList/edit/') }}/" + id);
  }

  function myFunction() {
    // Declare variables
    var input, filter, table, tr, td0, td1, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td0 = tr[i].getElementsByTagName("td")[0];
      td1 = tr[i].getElementsByTagName("td")[1];
      if (td0 || td1) {
        txtValue0 = td0.innerText;
        txtValue1 = td1.innerText;
        if ((txtValue0.toUpperCase().indexOf(filter) > -1) || (txtValue1.toUpperCase().indexOf(filter) > -1)) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>
@endsection