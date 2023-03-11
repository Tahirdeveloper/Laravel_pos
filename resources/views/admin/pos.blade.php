@extends('admin/layout')
@section('page_name','Point Of Sales')
@section('container')
<div class="card">
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                       +Add Customer
                    </button>
                </div>
                <div class="col-sm-12 col-md-4 d-flex justify-content-center">
                    <select name="customer" id="" class="form-control" style="width:fit-content;border:2px solid #17a2b8;">
                        <option value="">Select Customer</option>
                        <option value="">Tahir Shah</option>
                    </select>
                </div>
                <div class="col-sm-12 col-md-4 d-flex justify-content-end">
                    <button class="btn btn-info" id="add_row">+Add Row</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 my-3">
                    <table id="example1" class="table table-bordered dataTable dtr-inline" aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 0px;">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Product Name & Details</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Price</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Quantity</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Total</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 0px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr class="odd">
                                <td class="dtr-control sorting_1 sale_td" tabindex="0">1</td>
                                <td class="sale_td" style="height: 80px; vertical-align:middle">
                                    <textarea name="" id="" cols="30" rows="2" class="sale_input" style="border: none;" placeholder="Details here..."></textarea>
                                </td>
                                <td class="sale_td"><input type="text" class="w-100 text-center sale_input" placeholder="Click here..." style="border: none;"></td>
                                <td class="sale_td"><input type="text" class="w-50 text-center sale_input" placeholder="Click here..." style="border: none; "></td>
                                <td class="sale_td"><input type="text" class="w-75 text-center sale_input" disabled style="border: none; "></td>
                                <td class="sale_td text-center">X</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6" style="margin-top:20%">
                    <div class="row">
                        <div class="col-4">
                            <button class="btn btn-info">PayNow</button>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-info">Multiple Pay</button>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-info">Discount</button>
                        </div>
                    </div>
                </div>

                <!-- /.col -->
                <div class="col-6" style="padding-left:66px; margin-top:-35px">
                    <p class="lead my-2 bg-secondary text-center mb-1" id='date'>Sales Date:</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width:76%">Subtotal:</th>
                                    <td>$250.30</td>
                                </tr>
                                <tr>
                                    <th>Discount</th>
                                    <td>$10.34</td>
                                </tr>
                                <tr>
                                    <th>Grant Amount:</th>
                                    <td>$5.80</td>
                                </tr>
                                <tr>
                                    <th>Due Amount:</th>
                                    <td>$265.24</td>
                                </tr>
                                <tr>
                                    <th>Change Amount:</th>
                                    <td>$265.24</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- Customer Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                <!-- <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div> -->
                  <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" class="control-label mb-1">Name</label>
                            <input id="name" name="name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group has-success col-md-6">
                            <label for="cc-name" class="control-label mb-1">Phone</label>
                            <input id="cc-name" name="phone" type="text" class="form-control cc-name valid" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Address</label>
                        <textarea id="addresss" name="address" type="text" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="id" >

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info">Save</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $("#add_row").on('click', function() {
        $('#tbody').append('<tr class="odd">\
                                        <td class="dtr-control sorting_1 sale_td" tabindex="0">1</td>\
                                        <td class="sale_td" style="height: 80px; ">\
                                         <textarea name="" id="" cols="30" rows="2" style="border: none; class="sale_input" " placeholder="Details here..."></textarea>\
                                        </td>\
                                        <td class="sale_td"><input type="text" class="w-100 text-center sale_input" placeholder="Click here..." style="border: none;"></td>\
                                        <td class="sale_td"><input type="text" class="w-50 text-center sale_input" placeholder="Click here..." style="border: none; "></td>\
                                        <td class="sale_td"><input type="text" class="w-75 text-center sale_input" disabled style="border: none; "></td>\
                                        <td class="sale_td text-center">X</td>\
                                    </tr> ');
    });
    // Create a new date object
    var currentDate = new Date();

    // Extract the day, month, and year from the date object
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1; // Note: January is 0
    var year = currentDate.getFullYear();

    // Create a formatted date string
    var formattedDate = day + '/' + month + '/' + year;

    // Use the formatted date string in your code
    $("#date").text('Sales Date: ' + formattedDate);
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>
@endsection