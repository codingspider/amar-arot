<?php

namespace App\Http\Controllers;

use App\ExpressOrder;
use App\ExpressOrderDetails;
use App\Model\Products;
use App\Model\Address;
use App\Model\District;
use App\Model\MeasurmentUnit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpressOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exp_orders = ExpressOrder::where('user_id', Auth::user()->id)->get();
        return view('expressorders.index', compact('exp_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $billing = Address::join('districts', 'districts.id', 'addresses.district_id')->where('user_id', Auth::user()->id)->where('type', "0")->where('status', "1")->select('addresses.id', 'addresses.address_line_1', 'addresses.address_line_2', 'addresses.type', 'districts.name')->first();

        $shipping = Address::join('districts', 'districts.id', 'addresses.district_id')->where('user_id', Auth::user()->id)->where('type', "1")->where('status', "1")->select('addresses.id', 'addresses.address_line_1', 'addresses.address_line_2', 'addresses.type', 'districts.name')->first();

        $districts = District::all();
        $units = MeasurmentUnit::all();
        return view('expressorders.create', compact('units', 'districts', 'billing', 'shipping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        foreach ($request->name as $key => $order_detail) {
            if (empty($request->name[$key])) {
                return back()->with('error', 'Name is Required');
            } else if (empty($request->qty[$key])) {
                return back()->with('error', 'Qty is Required');
            }
        }

        $exp_order = ExpressOrder::create(
            [
                "status" => "Pending",
                "read_status" => "1",
                "user_id" => Auth::user()->id,
            ]
        );

        foreach ($request->name as $key => $order_detail) {

            ExpressOrderDetails::create([
                "exporder_id" => $exp_order->id,
                "name" => $request->name[$key],
                "brand" => $request->brand[$key],
                "qty" => $request->qty[$key],
                "unit" => $request->unit[$key],
            ]);
        }
        // billing
        Address::updateOrCreate(
            [
                "id" => $request->billing_id,
                "status" => "1",
                "type" => '0',
                "user_id" => Auth::user()->id,

            ],
            [
                "address_line_1" => $request->billing_address,
                "district_id" => $request->billing_district,
                "status" => "1",
                "type" => '0',
                "user_id" => Auth::user()->id,
            ]
        );
        // Shipping same as Billing
        if ($request->shipping == 'billing') {
            Address::updateOrCreate(
                [
                    "id" => $request->billing_id,
                    "status" => "1",
                    "type" => '1',
                    "user_id" => Auth::user()->id,
                ],
                [
                    "address_line_1" => $request->billing_address,
                    "district_id" => $request->billing_district,
                    "status" => "1",
                    "type" => '1',
                    "user_id" => Auth::user()->id,
                ]
            );
        } else {
            Address::updateOrCreate(
                [
                    "id" => $request->shipping_id,
                    "status" => "1",
                    "type" => '1',
                    "user_id" => Auth::user()->id,
                ],
                [
                    "address_line_1" => $request->shipping_address,
                    "district_id" => $request->shiping_district,
                    "status" => "1",
                    "type" => '1',
                    "user_id" => Auth::user()->id,
                ]
            );
        }

        return redirect()->route('express-orders.show', $exp_order->id)->with('success', 'Order Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $billing = Address::where('user_id', Auth::user()->id)->where('type', '0')->where('status', '1')->get();
        $shipping = Address::where('user_id', Auth::user()->id)->where('type', '1')->where('status', '1')->get();

        $total_price = 0;
        $express_order  = ExpressOrder::find($id);
        $express_order_details = ExpressOrderDetails::where('exporder_id', $id)->get();
        $address = Address::join('districts', 'districts.id', 'addresses.district_id')->where('user_id', $express_order->user_id)->where('addresses.status', '1')->where('addresses.type', '1')->first();
        // dd($address);
        return view('expressorders.show', compact('express_order', 'express_order_details', 'address', 'total_price', 'billing', 'shipping'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $units = MeasurmentUnit::all();
        $express_order_details = ExpressOrderDetails::where('exporder_id', $id)->get();
        return view('expressorders.edit', compact('express_order_details', 'id', 'units'));
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
        foreach ($request->name as $key => $order_detail) {
            if (empty($request->name[$key])) {
                return back()->with('error', 'Name is Required');
            } else if (empty($request->qty[$key])) {
                return back()->with('error', 'Qty is Required');
            }
        }

        ExpressOrderDetails::where('exporder_id', $id)->delete();
        foreach ($request->name as $key => $order_detail) {
            ExpressOrderDetails::updateOrCreate([
                "exporder_id" => $id,
                "name" => $request->name[$key],
                "brand" => $request->brand[$key],
                "qty" => $request->qty[$key],
                "unit" => $request->unit[$key],
            ]);
        }
        return redirect()->route('express-orders.show', $id)->with('success', 'Order Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExpressOrder::find($id)->update(
            [
                "deleted_by" => Auth::user()->id
            ]
        );
        return redirect()->route('express-orders.index')->with('success', 'Deleted Successfully');
    }


    public function ajaxProductListRequest(Request $request)
    {
        // return $request->product;
        $products = Products::where('name', 'LIKE', "%$request->product_name%")->get();
        if (count($products) > 0) {
            $output =  '<ul class="collection">';

            foreach ($products as $product) {
                $output .= '<li class="collection-item">' . $product->name . '</li>';
            }
            $output .=  "</ul>";
            echo $output;
        } else {
            $output = '';
        }
    }
}
