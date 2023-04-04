<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\authcontroller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;

Route::get('/',[CustomerController::class,'dashboard'])->name('admin.dashboard');
 Route::get('/customer', function () {
  return view('admin/cdetail');
});
 //Route::get('/admin/login', function () {
   // return view('login');
 //});
   // Route::get('/dashboard',function(){
   // return view('dashboard');
   // });
 Route::get('/login',[authcontroller::class,'getlogin'])->name('getlogin');
 Route::post('/login',[authcontroller::class,'postlogin'])->name('postlogin');
 Route::get('dashboard',[CustomerController::class,'dashboard'])->name('admin.dashboard');

 
 Route::post('pos/store',[OrderController::class,'place_order'])->name('admin.pos');
 Route::get('invoiceList',[InvoiceController::class,'invoiceList'])->name('admin.invoiceList');
 Route::post('invoiceList/edit/{id1}',[InvoiceController::class,'edit'])->name('invoiceList.edit');
 Route::get('invoice/{id1}/{id2}',[InvoiceController::class,'invoice_data'])->name('admin.invoice');
//  ========================Store Details==================================
Route::get('/editStore',[AdminController::class,'view'])->name('admin.storeDetails');
Route::post('/editStore',[AdminController::class,'edit'])->name('admin.editDetails');
Route::get('/addStore',[AdminController::class,'add'])->name('admin.storeDetails');
Route::post('/addStore/invoice',[AdminController::class,'save'])->name('admin.saveStoreDetails');
// =========================================================================
 Route::get('invoiceList/delete/{id}',[InvoiceController::class,'delete'])->name('invoiceList.delete');
 Route::get('/pos',[CustomerController::class,'pos'])->name('pos');
 Route::post('/pos',[CustomerController::class,'store'])->name('admin.dashboard');
//  ========================Customer Details==================================
 Route::get('editCustomer',[CustomerController::class,'edit'])->name('admin.addCustomer');
 Route::get('addCustomer',[CustomerController::class,'add'])->name('admin.addCustomer');
 Route::post('editCustomer',[CustomerController::class,'edit'])->name('admin.addCustomer');
// =========================Reports============================================
Route::get('viewreport/{id}',[reportController::class,'view'])->name('admin.report');

 Route::view("invoice",'admin/invoice');
 Route::view("invoice-print",'admin/invoice-print');
 Route::view("Setting",'admin/Setting');
 Route::view("cdetail",'admin/cdetail');