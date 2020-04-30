<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function all_orders(){

        $orders = DB::table('orders')
            ->join('order_statuses', 'order_statuses.order_id', '=', 'orders.id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'order_statuses.name as status')
            ->where('orders.user_id', Auth::id())
            ->get();
        // dd($orders);
        
            $slae_orders = DB::table('orders')
            ->join('order_statuses', 'orders.order_status_id', '=', 'order_statuses.id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'order_statuses.name as status')
            ->where('orders.user_id', Auth::id())
            ->get();

        
        return view('orders.index', compact('orders','slae_orders'));
    }
    public function order_details($id){

        $order = DB::table('order_details')
            ->leftjoin('order_statuses', 'order_details.order_id', '=', 'order_statuses.order_id')
            ->leftjoin('orders', 'orders.id', '=', 'order_details.order_id')
            ->leftjoin('products', 'products.id', '=', 'order_details.product_id')
            ->select('orders.*', 'order_statuses.name as status', 'order_details.*','products.*')
            ->where('orders.user_id', Auth::id())
            ->get();

        return view('orders.show', compact('order'));
    }
}
