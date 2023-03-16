@extends('admin/layout')
@section('page_name','Point Of Sales')
@section('container')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.pos')}}" method="post" id="form1">
            @csrf
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
                            @foreach($customers as $customer)
                            <option value="{{$customer->customer_id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-4 d-flex justify-content-end">
                        <button type="button" class="btn btn-info" id="add_row">+Add Row</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 my-3">
                        <table id="example1" class="table table-bordered dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 0px;">#</th>
                                    <th class="sorting" aria-label="Browser: activate to sort column ascending">Product Name & Details</th>
                                    <th class="sorting" aria-label="Platform(s): activate to sort column ascending">Price</th>
                                    <th class="sorting" aria-label="Engine version: activate to sort column ascending">Quantity</th>
                                    <th class="sorting" aria-label="CSS grade: activate to sort column ascending">Total</th>
                                    <th class="sorting" style="width: 0px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="table1">
                                <tr class="odd">
                                    <td class="dtr-control"><input type="text" class="bg-white" name="p_id[]" value="1" style="border:none; width:25px"></td>
                                    <td class="sale_td" style="height: 80px; vertical-align:middle">
                                        <input type="text" name="product_name[]" id="" class="sale_input" style="border: none;" placeholder="Details here...">
                                    </td>
                                    <td class="sale_td"><input type="text" name="price[]" id="price1" class=" price w-100 text-center sale_input" placeholder="Click here..." style="border: none;"></td>
                                    <td class="sale_td"><input type="text" name="qty[]" id="qty1" class="qty w-50 text-center sale_input" placeholder="Click here..." style="border: none; "></td>
                                    <td class="sale_td"><input type="text" name="total[]" id="total" class="total w-75 text-center sale_input bg-white" style="border: none; "></td>
                                    <td class="text-center align-middle px-0">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                @if ($errors->any())
                <div class="alert alert-danger w-50 m-lg-n3">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success w-50 m-lg-n3">
                    {{ session()->get('success') }}
                </div>
                @endif

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6" style="margin-top:20%">
                        <div class="row">
                            <div class="col-4">
                                <div class="d-flex">
                                    <input type="text" class="mb-2 w-75 from-control discount" id="discount" placeholder="Discount">
                                    <button type="submit" class="btn-xs btn-outline-info mb-2 discount" id="add_discount">Add</button>
                                </div>
                                <button type="button" class="btn btn-info discountBtn" onclick="popUp('discount')">Discount</button>
                            </div>
                            <div class="col-4">
                                <div class="d-flex">
                                    <input type="text" class="mb-2 w-75 from-control multiPay" id="multiPay" placeholder="Amount">
                                    <button type="submit" class="btn-xs btn-outline-info mb-2 multiPay" id="multi_add">Add</button>
                                </div>
                                <button type="button" class="btn btn-info multiPayBtn" onclick="popUp('multiPay')">Multiple Pay</button>
                            </div>
                            <div class="col-4">
                                <button type="button" onclick="submitForm('form1')" class="btn btn-info payNow">PayNow</button>
                            </div>
                        </div>
                    </div>

                    <!-- /.col -->
                    <div class="col-6" style="padding-left:66px; margin-top:-19px">
                        <p class="lead my-2 bg-secondary text-center mb-1">Purchase Date:
                            <input type="text" name="date" id="date" class="sale_input bg-secondary" style="border: none;" value="00">
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:76%">Subtotal:</th>
                                        <td><input type="text" name="subtotal" id="subtotal" class="sale_input text-right" style="border: none;" value="00"></td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td><input type="text" name="discount" id="showDiscount" class="sale_input text-right" style="border: none;" value="00"></td>
                                    </tr>
                                    <tr>
                                        <th>Grant Amount:</th>
                                        <td><input type="text" name="grant" id="grant" class="sale_input text-right" style="border: none;" value="00"></td>
                                    </tr>
                                    <tr>
                                        <th>Due Amount:</th>
                                        <td><input type="text" name="due" id="due" class="sale_input text-right" style="border: none;" value="00"></td>
                                    </tr>
                                    <tr>
                                        <th>Change Amount:</th>
                                        <td><input type="text" name="change" id="change" class="sale_input text-right" style="border: none;" value="00"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
        </form>
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
            <form action="{{route('admin.dashboard')}}" method="post" id="form2">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
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
                    <input type="hidden" name="id">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" onclick="submitForm('form2')" class="btn btn-info">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    var id = 1;

    function calculateTotal($row) {
        let price = parseInt($row.find('.price').val());
        let qty = parseInt($row.find('.qty').val());
        if (!isNaN(price) && !isNaN(qty)) {
            let total = qty * price;
            $row.find('.total').val(total);
        }
    }

    $("#add_row").on('click', function() {
        $('#table1').append('<tr class="odd">\
      <td class="dtr-control"><input type="text" class="bg-white" name="p_id[]" value="' + (id + 1) + '"  style="border:none;width:25px"></td>\
       <td class="sale_td" style="height: 80px; ">\
       <input type="text" name="product_name[]" id="" class="sale_input" style="border: none;" placeholder="Details here...">\
       </td>\
       <td class="sale_td"><input type="text" class="price w-100 text-center sale_input" name="price[]" placeholder="Click here..." style="border: none;"></td>\
       <td class="sale_td"><input type="text" class="qty w-50 text-center sale_input" name="qty[]" placeholder="Click here..." style="border: none;"></td>\
       <td class="sale_td"><input type="text" class="total w-75 text-center sale_input" id="total" name="total[]" style="border: none;"></td>\
       <td class="text-center align-middle px-0">\
       <a href="#" class="shop-tooltip close float-none text-danger del" data-original-title="Remove"><i class="fa-solid fa-trash-xmark"></i>X</a>\
        </td>\
   </tr>');

    });
    let subTotal = 0;
    $(document).on('change', '.price, .qty', function() {
        let $row = $(this).closest('tr');
        $row.data('price', parseInt($row.find('.price').val()));
        $row.data('qty', parseInt($row.find('.qty').val()));
        calculateTotal($row);

    });

    $('#table1').on('input', 'input', function() {
        $('input.price, input.qty').each(function() {
            var price = parseFloat($(this).closest('tr').find('.price').val());
            var qty = parseFloat($(this).closest('tr').find('.qty').val());
            if (!isNaN(price) && !isNaN(qty)) {
                $(this).closest('tr').find('.total').val(price * qty);
            }
        });

        var subtotal = $('input.total').toArray().reduce(function(sum, el) {
            return sum + parseFloat(el.value || 0);
        }, 0);
        $('#subtotal').val(subtotal);
    });


    $("table").on("click", ".del", function() {
        // Remove the parent TR tag completely from DOM.
        $(this).closest("tr").remove();
    });

    function submitForm(formId) {
        document.getElementById(formId).submit();
    }
    $(".discount").hide();
    $(".multiPay").hide();

    function popUp(button_class) {
  $('.' + button_class).slideToggle();

  function calculateAmounts() {
    let inputDiscount = parseFloat($('#discount').val());
    let subTotal = parseFloat($("#subtotal").val());
    let showDiscount = parseFloat($('#showDiscount').val());
    let grantAmount = parseFloat($('#grant').val());
    let DueAmount = subTotal - (showDiscount + grantAmount);
    $("#due").val(DueAmount);
    let paidAmount = showDiscount + grantAmount;
    if (paidAmount > subTotal) {
      $("#due").val(00);
      $('#change').val(paidAmount - subTotal);
    }
  }

  $("#add_discount").on('click', function(e) {
    e.preventDefault();
    $('#showDiscount').val(parseFloat($('#discount').val()));
    calculateAmounts();
    $('.discount').hide();
  });

  $("#multi_add").on('click', function(e) {
    e.preventDefault();
    $('#grant').val(parseFloat($('#multiPay').val()));
    calculateAmounts();
    $('.multiPay').hide();
  });

  // add event listeners to update amounts when price, qty or total change
  $(".price, .qty, #total").on('input', function() {
    let price = parseFloat($("#price").val()) || 00;
    let qty = parseFloat($("#qty").val()) || 00;
    let total = price * qty;
    $("#total").val(total);
    let subTotal = parseFloat($("#subtotal").val());
    subTotal += total - parseFloat($(this).data('prev-value')) || 00;
    $(this).data('prev-value', total);
    $("#subtotal").val(subTotal);
    calculateAmounts();
  });
}

    // Create a new date object
    var currentDate = new Date();
    // Extract the day, month, and year from the date object
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1; // Note: January is 0
    var year = currentDate.getFullYear();

    // Create a formatted date string
    var formattedDate = day + '/' + month + '/' + year;

    // Use the formatted date string in your code
    $("#date").val(formattedDate);
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>
@endsection