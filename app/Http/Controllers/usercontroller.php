<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
     public function dashboard()
     {
        return view('admin.dashboard');
     }
     public function pos()
     {
        return view('admin.pos');
     }
     public function invoiceList()
     {
        return view('admin/invoiceList');
     }
}
