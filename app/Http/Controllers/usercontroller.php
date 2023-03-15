<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
class usercontroller extends Controller
{
     public function dashboard()
     {
        return view('admin.dashboard');
     }
     public function pos()
     {
      $customers = customer::all();
        return view('admin.pos',compact('customers'));
     }
     public function invoiceList()
     {
        return view('admin/invoiceList');
     }
}
