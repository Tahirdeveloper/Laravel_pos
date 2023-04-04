<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $total = DB::table('invoices')
        ->selectRaw('SUM(dues) as allDues, SUM(`change`) as allChange, SUM(subTotal) as allTotal')
        ->first();
        $customers=customer::all()->count();
        $result = DB::table('invoices')->join('customers', 'invoices.customer_id', '=', 'customers.customer_id')
            ->select(
                'customers.name',
                'customers.phone',
                'customers.address',
                DB::raw('SUM(invoices.dues) as total_dues'),
                DB::raw('SUM(invoices.change) as total_change'),
                
            )
            ->groupBy('customers.name', 'customers.phone', 'customers.address')
            ->get();

        return view('admin.dashboard', compact('result','total','customers'));
    }
    public function pos()
    {
        $customers = customer::all();
        return view('admin.pos', compact('customers'));
    }

    // ===================================
    public function add(Request $request)
    {
        $id = 0;
        return view('admin.addCustomer', compact('id'));
    }
    public function edit(Request $request)
    {
        $id = 1;
        $name = $request->input('name');
        $customers = DB::table('customers')->where('name',$name)->first();

        if($customers !== null) {
            return view('admin.addCustomer', compact('id', 'customers'));
        } else {
            session()->flash('empty', 'No record found!');
            return view('admin.addCustomer', compact('id', 'customers'));
        }
    }


    public function store(Request $request)
    {
        $validator = validator(
            $request->all(),
            [
                'name' => 'required|max:255',
                'phone' => 'required|max:12'
            ]
        );
        if ($validator->fails()) {
            session()->put('input', 'You entered invalid inputs');
            return redirect()->back()->withErrors($validator);
        }
        $c_id = $request->post('c_id');
        $customer = $c_id > 0 ? Customer::find($c_id) : new Customer();

        $customer->name = $request->post('name');
        $customer->phone = $request->post('phone');
        $customer->address = $request->post('address');
        if ($customer->save()) {
            session()->flash('success', "Customer details saved successfully!");
            return redirect('/dashboard');
        }
    }
}
