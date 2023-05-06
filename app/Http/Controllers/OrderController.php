<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class OrderController extends Controller
{
    public function place_order(Request $request)
    {
        $validator = validator(
            $request->all(),
            [
                'product_name' => 'required|max:500',
                'price' => 'required',
                'customer' => 'required',
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
                $random = Str::random(5);
                $random = str_replace(['o', 'h', 'p', 'F', 'Q', 's'], ['5', '6', '7', '9', '8', '4'], $random);
                $order_no = str_shuffle($random);

                // Insert orders data and get the last inserted order_id
                $order_id = DB::table('order_inv')->insertGetId([
                    'order_no' => $order_no,
                    
                ]);

                // Insert order items data
                $current_time=Carbon::now();
                foreach ($p_id as $key => $value) {
                    
                    $order_item_array = array();
                    $order_item_array['product_name'] = $product_arr[$key];
                    $order_item_array['price'] = $price_arr[$key];
                    $order_item_array['qty'] = $qty_arr[$key];
                    $order_item_array['total'] = $total_arr[$key];
                    $order_item_array['order_id'] = $order_id;
                    $order_item_array['customer_id'] = $request->post('customer');
                    $order_item_array['created_at'] = $current_time;
                    $order_item_array['updated_at'] = $current_time;
                    DB::table('orders')->insert($order_item_array);
                }

                // Insert invoice data with the last inserted order_id as the foreign key
                $invoice = new invoice();
                $invoice->invoice_no = $order_no;
                $invoice->discount = $request->post('discount');
                $invoice->dues = $request->post('due');
                $invoice->change = $request->post('change');
                $invoice->subTotal = $request->post('subtotal');
                $invoice->date = $request->post('date');
                $invoice->customer_id = $request->post('customer');
                $invoice->order_id = $order_id;
                $invoice->status = ($invoice->dues > 0) ? 0 : 1;
                $invoice->save();

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
