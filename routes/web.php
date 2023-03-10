<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\admin\authcontroller;

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
 Route::get('pos',[usercontroller::class,'pos'])->name('admin.pos');
 Route::get('invoiceList',[usercontroller::class,'invoiceList'])->name('admin.invoiceList');

 Route::view("invoice",'admin/invoice');
 Route::view("invoice-print",'admin/invoice-print');
 Route::view("Setting",'admin/Setting');
 Route::view("cdetail",'admin/cdetail');