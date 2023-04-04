@extends('admin/layout')
@section('path1','Dashboard')
@section('url','Dashboard')

@section('container')
<div class="card card-info w-75 m-auto my-lg-5">
    <div class="card-header">
        @if($id>0)
        @section('page_name','Edit Customer')
        @section('path2','Edit Customer')
        <h3 class="card-title">Edit Customer</h3>
        <form action="{{route('admin.addCustomer',['id'=>10])}}" method="post">
            @csrf
            <div class="input-group float-lg-right w-25">
                <input type="search" name="name" class="form-control" placeholder="Search by Name">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @else
    @section('page_name','Add Customer')
    @section('path2','Add Customer')
    <h3 class="card-title">Add New Customer</h3>
</div>
@endif

<!-- /.card-header -->
<div class="card-body">
    <form action="{{route('admin.dashboard')}}" method="post">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name" class="control-label mb-1">Name</label>
                <input id="name" name="name" type="text" value="{{$id>0&&$customers? $customers->name:''}}" class="form-control" required>
            </div>
            <div class="form-group has-success col-md-6">
                <label for="cc-name" class="control-label mb-1">Phone</label>
                <input id="cc-name" name="phone" type="text" value="{{$id>0&&$customers? $customers->phone:''}}" class="form-control cc-name valid" required>
            </div>
        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Address</label>
            <textarea id="addresss" name="address" type="text" class="form-control">{{$id>0&&$customers? $customers->address:''}}</textarea>
        </div>
        <input type="hidden" name="c_id" value="{{$id>0&&$customers? $customers->customer_id:''}}">
        <button type="submit" class="btn-block btn btn-secondary">Save</button>
    </form>
</div>
<!-- /.card-body -->
@if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success')}}
        </div>
        @endif
        @if (session()->has('empty'))
        <div class="alert alert-warning">
            {{ session()->get('empty')}}
        </div>
        @endif
</div>
@endsection