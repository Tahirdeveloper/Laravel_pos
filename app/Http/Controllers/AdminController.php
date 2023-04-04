<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function add(Request $request)
    {
        $id = 0;
        return view('admin.storeDetails', compact('id'));
    }
    public function view()
    {
        $id = 1;
        $store="";
        return view('admin.storeDetails', compact('id','store'));
    }
    public function edit(Request $request)
    {
        $id = 2;
        $name = $request->input('s_name');
        $store = DB::table('admins')->where('store_name','like','%'.$name.'%')->first();
        if($store !== null) {
            return view('admin.storeDetails', compact('id', 'store'));
        } else {
            session()->flash('empty', 'No record found!');
            return view('admin.storeDetails', compact('id', 'store'));
        }
        

    }


    public function save(Request $request)
    {
        $validator = validator(
            $request->all(),
            [
                'store_name' => 'required|max:255',
                'phone' => 'required|max:12',
                'banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max_width=1000,max_height=150',
            ]
        );
        if ($validator->fails()) {
            session()->put('input', 'You entered invalid inputs');
            return redirect()->back()->withErrors($validator);
        }
        $s_id = $request->post('s_id');
        $admin = $s_id > 0 ? admin::find($s_id) : new admin();

        $admin->store_name = $request->post('store_name');
        $admin->phone = $request->post('phone');
        $admin->address = $request->post('address');
        $image = $request->file('banner'); 
        $file_name = time() . '.' . $image->extension();
        $image->storeAs('public/media',$file_name);
        $admin->banner = $file_name; 

        if ($admin->save()) {
            session()->flash('success', "Store details saved successfully!");
            $id=0;
            return view('admin.storeDetails',compact('id'));

        }
    }
}
