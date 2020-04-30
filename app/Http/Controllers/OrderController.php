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
            ->join('order_statuses', 'orders.order_status_id', '=', 'order_statuses.id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'order_statuses.name as status')
            ->where('orders.user_id', Auth::id())
            ->get();
        
            $slae_orders = DB::table('orders')
            ->join('order_statuses', 'orders.order_status_id', '=', 'order_statuses.id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'order_statuses.name as status')
            ->where('orders.user_id', Auth::id())
            ->get();

        
        return view('orders.index', compact('orders','slae_orders'));
    }
}
