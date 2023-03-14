<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
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
        } else {
            $customer = new customer;
            $customer->name = $request->post('name');
            $customer->phone = $request->post('phone');
            $customer->address = $request->post('address');
            $customer->name = $request->post('name');
            $customer->save();
            return redirect('/dashboard');
        }
    }
}
