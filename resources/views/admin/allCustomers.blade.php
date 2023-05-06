@extends('admin/layout')
@section('path1','Dashboard')
@section('url','Dashboard')
@section('container')
<div class="card-body py-2">
    @section('page_name','All Customer')
    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="col-sm-12 col-md-3 p-0 mb-2">
            <div class="input-group">
                <input type="search" class="form-control" id="search" onkeyup="myFunction()" placeholder="Search by Name">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="sorting sorting_asc text-center">Name</th>
                            <th class="sorting text-center">Phone</th>
                            <th class="sorting text-center">Address</th>
                            <th class="sorting text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @if($customers)
                        @foreach($customers as $customer)
                        <tr class="odd">
                            <td class="dtr-control text-center sorting_1 center">{{$customer->name}}</td>
                            <td class="text-center">{{$customer->phone}}</td>
                            <td class="text-center">{{$customer->address}}</td>
                            <td class="text-center">
                                <a href="{{route('admin.Customer.delete',['id'=>$customer->customer_id])}}"><span class="badge bg-danger">Delete</span></a>
                                <a href="{{route('admin.Customer.update',['id'=>$customer->customer_id])}}"><span class="badge bg-success">Edit</span></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
        <!-- <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <ul class="pagination d-flex justify-content-end">
                                    <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
    </div>
</div>
@endsection