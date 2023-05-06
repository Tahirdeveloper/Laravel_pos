<?php

namespace App\Http\Controllers;
use App\Models\order_inv;
use Illuminate\Support\Facades\DB;
use App\Models\customer;
use App\Models\invoice;
use App\Models\order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoiceList($id = 0)
    {
      
        $customers = invoice::with('customer')->get();
            return view('admin.invoiceList', ['customers'=>$customers]);
    }
    public function delete($id)
    {
        // $remove = order_inv::find($id)->get();
        $remove = DB::table('order_inv')->where('order_id', '=', $id)->delete();
        
        if ($remove) {
            session()->flash('delete', 'customer record deleted successfully!');
            return redirect('invoiceList');
        }
    }

    public function edit(Request $request, $id1)
    {
        $data = DB::table('invoices')->where('invoice_no', '=', $id1)->first();
        $amount = (float) $request->post('amount');
        $db_dues = (float) $data->dues;
        if ($amount >= $db_dues) {
            $new_change = +$amount - $db_dues;
            $new_status = 1;
            $new_dues = 0;
        } else {
            $new_change = 0;
            $new_status = 0;
            $new_dues = $db_dues - $amount;
        }
        DB::table('invoices')->where('invoice_no', '=', $id1)->update(['dues' => $new_dues, 'change' => $new_change, 'status' => $new_status]);
        return redirect('invoiceList');
    }

    public function invoice_data($id1, $id2)
    {
        $customer = Customer::find($id1);
        $orders = DB::table('invoices')
            ->join('orders', 'invoices.order_id', '=', 'orders.order_id')
            ->select(
                'invoices.invoice_no',
                'invoices.discount',
                'invoices.dues',
                'invoices.change',
                'invoices.subTotal',
                'invoices.status',
                'invoices.date',
                'invoices.customer_id',
                'orders.id',
                'orders.product_name',
                'orders.price',
                'orders.qty',
                'orders.total',
            )
            ->where('invoices.invoice_no', $id2)->get();
        $store = DB::table('admins')->latest()->first();
        return view('admin.invoice', ['customer' => $customer, 'orders' => $orders, 'store' => $store]);
    }
}
