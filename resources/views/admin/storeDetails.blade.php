@extends('admin/layout')
@section('container')
<div class="card card-info w-75 m-auto my-lg-5">
    <div class="card-header">
        @if($id>0)
        @section('page_name','Edit Details')

        <h3 class="card-title">Edit Store Details</h3>
        <form action="{{route('admin.editDetails')}}" method="post">
            @csrf
            <div class="input-group float-lg-right w-25">
                <input type="search" name="s_name" class="form-control" placeholder="Search by Name">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @else
    @section('page_name','Add Store Details')
    <h3 class="card-title">Store Details</h3>
</div>
@endif

<!-- /.card-header -->
<div class="card-body">
    <form action="{{route('admin.saveStoreDetails')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name" class="control-label mb-1">Store Name</label>
                <input id="name" name="store_name" type="text" value="{{$id>1&&$store!==null?$store->store_name:''}}" class="form-control" required>
            </div>
            <div class="form-group has-success col-md-6">
                <label for="cc-name" class="control-label mb-1">Phone</label>
                <input id="cc-name" name="phone" type="text" class="form-control cc-name valid" value="{{$id>1&&$store!==null?$store->phone:''}}" required>
            </div>
            <div class="form-group has-success col-md-6">
                <label for="cc-name" class="control-label mb-1">Banner Image</label>
                <input id="cc-name" type="file" name="banner" class="form-control cc-name valid" required>
                @if ($id > 1 && $store && $store->banner)
                 <span>Current file: {{ $store->banner }}</span><br>
                @endif
                <small>Max width: 1000px Max height: 150px</small>
            </div>
        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Address</label>
            <textarea id="addresss" name="address" type="text" class="form-control">{{$id>1&&$store!==null?$store->address:''}}</textarea>
        </div>
        <input type="hidden" name="s_id" value="{{$id>0&&$store? $store->id:null}}">
        <button type="submit" class="btn-block btn btn-secondary">Save</button>
    </form>
</div>
<!-- /.card-body -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
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