<?php

namespace App\Http\Controllers;
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
                $inv_id=DB::table('invoices')->latest('invoice_no')->value('invoice_no');
                foreach ($p_id as $key => $value) {
                    $order_array = array();
                    $order_array['product_name'] = $product_arr[$key];
                    $order_array['price'] = $price_arr[$key];
                    $order_array['qty'] = $qty_arr[$key];
                    $order_array['total'] = $total_arr[$key];
                    $order_array['order_no'] = $order_no;
                    $order_array['invoice_no']=$inv_id;
                    $order_array['customer_id'] = $request->post('customer');
                    DB::table('orders')->insert($order_array);
                }

                $result= new invoice();
                $discount = $request->post('discount');
                $grant = $request->post('grant');
                $date = $request->post('date');
                $due = $request->post('due');
                $change = $request->post('change');
                $subtotal = $request->post('subtotal');
                $customer_id=$request->post('customer');
                $status=1;
                if($due>0){
                    $status=0;
                }
                // ====================
              
                $result->invoice_no=$order_no;
                $result->discount=$discount;
                $result->dues=$due;
                $result->change=$change;
                $result->subTotal=$subtotal;
                $result->date=$date;
                $result->customer_id=$customer_id;
                $result->status=$status;
               
                $result->save();
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
