<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function place_order(Request $request)
    {
        $validator = validator(
            $request->all(),
            [
                'product_name' => 'required|max:500',
                'price' => 'required',
            ]
        );
        if ($validator->fails()) {
            session()->put('input', 'All fields required!');
            return redirect()->back()->withErrors($validator);
        } else {
          
           $product_arr = $request->post('product_name');
           $price_arr = $request->post('price');
            $qty_arr = $request->post('qty');
            $total_arr = $request->post('total');
            $p_id = $request->post('p_id');
            try {
                DB::beginTransaction();
            
                foreach ($p_id as $key => $value) {
                    $order_array = array();
                    $order_array['product_name'] = $product_arr[$key];
                    $order_array['price'] = $price_arr[$key];
                    $order_array['qty'] = $qty_arr[$key];
                    $order_array['total'] = $total_arr[$key];
                    $order_array['customer_id'] = $request->post('customer');
                    DB::table('orders')->insert($order_array);
                }
            
                DB::commit();
                session()->flash('success', 'Data inserted successfully!');
                return redirect('/pos');
            
            } catch (\Exception $e) {
                DB::rollback();
                session()->flash('error', 'Error: ' . $e->getMessage());
                return redirect()->back();
            }
            
        }
    }
}
