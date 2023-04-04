@extends('admin/layout')
@section('page_name','Dashboard')
@section('path1','Dashboard')
@section('url','dashboard')
@section('container')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$total->allTotal}}</h3>

                        <p>Total sale</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('admin.invoiceList')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$total->allDues}}</h3>
                        <p>Total Dues</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('admin.invoiceList')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner text-white">
                        <h3>{{$customers}}</h3>
                        <p>Total Customers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="color:white !important">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Sales</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body py-2">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="col-sm-12 col-md-3 p-0 mb-2">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Search Records">
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
                                        <th class="sorting text-center col-2">Total Dues</th>
                                        <th class="sorting text-center col-2">Total Change</th>
                                        <th class="sorting text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($result as $customer)
                                    <tr class="odd">
                                        <td class="dtr-control text-center sorting_1 center">{{$customer->name}}</td>
                                        <td class="text-center">{{$customer->phone}}</td>
                                        <td class="text-center">{{$customer->address}}</td>
                                        <td class="text-center">{{$customer->total_dues}}</td>
                                        <td class="text-center">{{$customer->total_change}}</td>
                                        <td class="text-center"><a href=""><span class="badge bg-info">View</span></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>
@endsection