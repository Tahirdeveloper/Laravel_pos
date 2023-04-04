<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function view($id)
    {
        $currentDate = Carbon::now();
        $today = $currentDate->toDateString();
        if ($id == 1) {
            $results = DB::table('orders')->join('customers', 'customers.customer_id', '=', 'orders.customer_id')
                ->whereRaw('DATE(orders.created_at) = ?', [$today])
                ->select(
                    'customers.customer_id',
                    'customers.name',
                    'customers.phone',
                    'customers.address',
                    'orders.order_id',
                    'orders.product_name',
                    'orders.price',
                    'orders.qty',
                    'orders.total',
                )->groupBy(
                    'customers.customer_id',
                    'customers.name',
                    'customers.phone',
                    'customers.address',
                    'orders.order_id',
                    'orders.product_name',
                    'orders.price',
                    'orders.qty',
                    'orders.total',
                )->get();
            $allTotal = DB::table('invoices')
                ->selectRaw('SUM(dues) as allDues, SUM(`change`) as allChange, SUM(subTotal) as subTotal,SUM(discount) as allDiscount')
                ->where('date', '=', $today)->first();
        } elseif ($id == 7) {
            $startDate = date('Y-m-d', strtotime('-7 days', strtotime($today))); // 7 days before the specific date
            $endDate = strtotime($today); // the specific date
            $results = DB::table('orders')->join('customers', 'customers.customer_id', '=', 'orders.customer_id')
                ->whereBetween('orders.created_at', [$startDate, $endDate])
                ->select(
                    'customers.customer_id',
                    'customers.name',
                    'customers.phone',
                    'customers.address',
                    'orders.order_id',
                    'orders.product_name',
                    'orders.price',
                    'orders.qty',
                    'orders.total',
                )->groupBy(
                    'customers.customer_id',
                    'customers.name',
                    'customers.phone',
                    'customers.address',
                    'orders.order_id',
                    'orders.product_name',
                    'orders.price',
                    'orders.qty',
                    'orders.total',
                )->get();
            $startDate = Carbon::now()->subDays(7)->toDateString();
            $endDate = Carbon::now()->toDateString();
            $allTotal = DB::table('invoices')
                ->selectRaw('SUM(dues) as allDues, SUM(`change`) as allChange, SUM(subTotal) as subTotal,SUM(discount) as allDiscount')
                ->whereBetween('date', [$startDate, $endDate])->first();
        } elseif ($id == 30) {
            $startDate = date('Y-m-d', strtotime('-30 days', strtotime($today))); // 30 days before the specific date
            $endDate = strtotime($today); // the specific date
            $results = DB::table('orders')->join('customers', 'customers.customer_id', '=', 'orders.customer_id')
                ->whereBetween('orders.created_at', [$startDate, $endDate])
                ->select(
                    'customers.customer_id',
                    'customers.name',
                    'customers.phone',
                    'customers.address',
                    'orders.order_id',
                    'orders.product_name',
                    'orders.price',
                    'orders.qty',
                    'orders.total',
                )->groupBy(
                    'customers.customer_id',
                    'customers.name',
                    'customers.phone',
                    'customers.address',
                    'orders.order_id',
                    'orders.product_name',
                    'orders.price',
                    'orders.qty',
                    'orders.total',
                )->get();
            $startDate = Carbon::now()->subDays(30)->toDateString();
            $endDate = Carbon::now()->toDateString();
            $allTotal = DB::table('invoices')
                ->selectRaw('SUM(dues) as allDues, SUM(`change`) as allChange, SUM(subTotal) as subTotal,SUM(discount) as allDiscount')
                ->whereBetween('date', [$startDate, $endDate])->first();
        }

        return view('admin.report', compact('results', 'allTotal', 'id'));
    }
}
