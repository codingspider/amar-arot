<?php

namespace App\Http\Controllers;

use App\ExpressOrder;
use App\ExpressOrderDetails;
use App\Model\Products;
use App\Model\Address;
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
        return view('expressorders.create');
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
                "user_id" => Auth::user()->id,
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
        return redirect()->route('express-orders.show',$exp_order->id)->with('success', 'Order Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $billing = Address::where('user_id', Auth::user()->id)->where('type','0')->where('status','1')->get();
        $shipping = Address::where('user_id', Auth::user()->id)->where('type','1')->where('status','1')->get();

        $total_price=0;
        $express_order  = ExpressOrder::find($id);
        $express_order_details = ExpressOrderDetails::where('exporder_id', $id)->get();
        $address = Address::join('districts','districts.id','addresses.district_id')->where('user_id',$express_order->user_id)->where('addresses.status','1')->where('addresses.type','1')->first();
        // dd($address);
        return view('expressorders.show', compact('express_order','express_order_details','address','total_price','billing','shipping'));
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
        return view('expressorders.edit',compact('express_order_details','id'));
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
            if(empty($request->name[$key])){
                return back()->with('error','Name is Required');
            }
            else if(empty($request->qty[$key])){
                return back()->with('error','Qty is Required');
            }
        }

        ExpressOrderDetails::where('exporder_id',$id)->delete();
        foreach ($request->name as $key => $order_detail) {
            ExpressOrderDetails::updateOrCreate([
                "exporder_id" => $id,
                "name" => $request->name[$key],
                "brand" => $request->brand[$key],
                "qty" => $request->qty[$key],
            ]);
        }
        return redirect()->route('express-orders.show',$id)->with('success', 'Order Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExpressOrderDetails::where('exporder_id',$id)->delete();
        ExpressOrder::find($id)->delete();
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
