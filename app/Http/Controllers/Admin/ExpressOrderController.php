<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ExpressOrder;
use App\ExpressOrderDetails;
use App\Model\Address;
use App\User;
use Illuminate\Support\Facades\DB;

class ExpressOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exp_orders = DB::table('express_orders')->orderBy('id', 'desc')->get();
        return view('admin/expressorders.index', compact('exp_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.expressorders.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->name as $key => $order_detail) {
            if(empty($request->name[$key])){
                return back()->with('error','Name is Required');
            }
            else if(empty($request->qty[$key])){
                return back()->with('error','Qty is Required');

            }
        }

        $exp_order = ExpressOrder::create(
            [
                "status" => "Pending",
                "read_status" => "1",
                "user_id" => $request->user_id,
            ]
        );

        foreach ($request->name as $key => $order_detail) {

            ExpressOrderDetails::create([
                "exporder_id" => $exp_order->id,
                "name" => $request->name[$key],
                "brand" => $request->brand[$key],
                "qty" => $request->qty[$key],
            ]);
        }
        return back()->with('success', ' Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $express_order  = ExpressOrder::find($id);
        $user = User::find($express_order->user_id);
        $total_price = 0;
        $express_order_details = ExpressOrderDetails::where('exporder_id', $id)->get();
        $address = Address::join('districts', 'districts.id', 'addresses.district_id')->where('user_id', $express_order->user_id)->where('addresses.status', '1')->where('addresses.type', '1')->first();
        // dd($address);
        return view('admin/expressorders.show', compact('express_order', 'express_order_details', 'address', 'total_price','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $express_order_details = ExpressOrderDetails::where('exporder_id', $id)->get();
        return view('admin/expressorders.edit', compact('express_order_details', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->unit_price;
        foreach ($request->name as $key => $order_detail) {
            if (empty($request->name[$key])) {
                return back()->with('error', 'Name is Required');
            } else if (empty($request->qty[$key])) {
                return back()->with('error', 'Qty is Required');
            }
        }

        ExpressOrderDetails::where('exporder_id', $id)->delete();

        foreach ($request->name as $key => $order_detail) {
            $products = DB::table('express_order_details')->insert([
                "exporder_id" => $id,
                "name" => $request->name[$key],
                "brand" => $request->brand[$key],
                "unit_price" => $request->unit_price[$key],
                "qty" => $request->qty[$key],
            ]);
        }
        ExpressOrder::where('id', $id)->update(
            [
                'status' => 'Confired',
                'read_status' => '0',
                'user_status' => '0',
            ]
        );
        return redirect()->route('admin.express-orders.show', $id)->with('success', 'Product Price Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
