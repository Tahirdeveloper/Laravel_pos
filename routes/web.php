<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\admin\authcontroller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

 Route::get('/', function () {
    return view('welcome');
 });
 //Route::get('/admin/login', function () {
   // return view('login');
 //});
   // Route::get('/dashboard',function(){
   // return view('dashboard');
   // });
 Route::get('/login',[authcontroller::class,'getlogin'])->name('getlogin');
 Route::post('/login',[authcontroller::class,'postlogin'])->name('postlogin');
 Route::get('dashboard',[usercontroller::class,'dashboard'])->name('admin.dashboard');

 
 Route::post('pos/store',[OrderController::class,'place_order'])->name('admin.pos');
 Route::get('invoiceList',[usercontroller::class,'invoiceList'])->name('admin.invoiceList');
 Route::get('/pos',[usercontroller::class,'pos'])->name('pos');
 Route::post('/pos',[CustomerController::class,'store'])->name('admin.dashboard');

 Route::view("invoice",'admin/invoice');
 Route::view("invoice-print",'admin/invoice-print');
 Route::view("Setting",'admin/Setting');
 Route::view("cdetail",'admin/cdetail');