<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;

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
       
        $status = DB::table('order_details')
            ->leftjoin('order_statuses', 'order_details.order_id', '=', 'order_statuses.order_id')
            ->leftjoin('orders', 'orders.id', '=', 'order_details.order_id')
            ->leftjoin('products', 'products.id', '=', 'order_details.product_id')
            ->select('orders.*', 'order_statuses.name as status','orders.id as order_id', 'order_details.*','products.*')
            ->where('orders.user_id', Auth::id())
            ->orderBy('orders.id', 'desc')
            ->first();

            // dd($status);
        


        $auth_user = DB::table('addresses')
                    ->join('users', 'users.id', 'addresses.user_id')
                    ->select('addresses.*', 'users.*')
                    ->orderBy('addresses.id', 'desc')
                    ->first();


        return view('orders.show', compact('order','auth_user','status'));
    }


    public function order_list (){

        return view('orders.order_list_admin');
    }
    public function get_order_list (Request $request){

        if ($request->ajax()) {
            $data = DB::table('order_statuses')
            
            ->get();

           
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('orders.order_list_admin');

    }


}
