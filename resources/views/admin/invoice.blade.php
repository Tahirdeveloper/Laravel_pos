@extends('admin.layout')
@section('page_name','Invoice')
@section('path2','Invoice')
@section('url','invoiceList')
@section('path1','Sales Record')
@section('container')

<div id="section">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:1000px;">
    <div class="modal-content">
      <div class="wrapper">
        <!-- Main content -->
        <section class="invoice p-3">
          <!-- title row -->
          <div class="row hide-this inv-header">
            <div class="col-12 bg-dark">
             <img src="{{$store?asset('/storage/media/'.$store->banner):""}}" width="964px" height="120px" alt="banner">
            </div>
            <!-- /.col -->
          </div><hr>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>{{$store?$store->store_name:""}}</strong><br>
                {{$store?$store->address:""}}<br>
                Phone: {{$store?$store->phone:""}}<br>
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong id="name">{{$customer->name}}</strong><br>
                <span id="address">{{$customer->address}}</span><br>
                <strong>Phone:</strong>
                <p id="phone">{{$customer->phone}}</p>
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <span>Details</span><br>
              <b>Invoice#:</b><span id="inv_no">{{$orders[0]->invoice_no}}</span><br>
              <b>Date:</b><span id="inv_date">{{$orders[0]->date}}</span><br>
              <b>Invoice Status:</b> <span id="inv_status">
                {{ $orders[0]->status==1?"Paid":"Unpaid"}}
              </span>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>price</th>
                    <th>Qty</th>
                    <th>total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->qty}}</td>
                    <td>{{$order->total}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
            </div>
            <!-- /.col -->
            <div class="col-6">
              <p class="lead">Order Date: <span>{{$orders[0]->date}}</span></p>

              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th>Subtotal:</th>
                      <td>{{$orders[0]->subTotal}}</td>
                    </tr>
                    <tr>
                      <th>Discount</th>
                      <td>{{$orders[0]->discount}}</td>
                    </tr>
                    <tr>
                      <th>Dues:</th>
                      <td>{{$orders[0]->dues}}</td>
                    </tr>
                    <tr>
                      <th>Change</th>
                      <td>{{$orders[0]->change}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div><i class="nav-icon fas fa-print-alt"></i>

          <div class="">
            <button type="button" class="btn btn-info" id="print-btn">Print</button>
          </div>
          <!-- /.row -->
        </section>
          <footer class="main-footer hide-this inv-footer">
            <strong>Powered &copy; By <a href="https://codessol.com"> Code solution</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
              <b>Version</b> 3.2.0
            </div>
          </footer>
        <!-- /.content -->
      </div>
    </div>
  </div>
</div>
<script>
    $("#print-btn").on('click', function(e) {
      e.preventDefault();
      $('.inv-header').removeClass('hide-this');
      $('.inv-footer').removeClass('hide-this');
      $('#section').print({
        	noPrintSelector: "#print-btn",
      });
      $('.inv-header').addClass('hide-this');
    $('.inv-footer').addClass('hide-this');
    });
</script>
@endsection