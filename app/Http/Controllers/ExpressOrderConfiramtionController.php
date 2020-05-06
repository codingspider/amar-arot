<?php

namespace App\Http\Controllers;

use App\Model\Address;
use App\ExpressOrder;
use App\ExpressOrderDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class ExpressOrderConfiramtionController extends Controller
{
    public function orderConfiramtion($id)
    {
        if (empty(Auth::user()->phone)) {
            return redirect()->route('profiles.show', Auth::user()->id)->with('success', 'Please Add Your Phone Number Then Confirm Your Order');
        }
        $address = Address::where('user_id', Auth::user()->id)->get();
        if (count($address) > 1) {
            ExpressOrder::where('id', $id)->update([
                'user_status' => '1'
            ]);
            return back()->with('success', 'Your Order is Confiremd');
        } else {
            return redirect()->route('profiles.show', Auth::user()->id)->with('success', 'Please Add Your Billing And Shipping Address Then Confirm Your Order');
        }
    }
    public function printExpressOrder($id)
    {

        $express_order  = ExpressOrder::find($id);
        $express_order->update(
            [
                'status' => 'Processing'
            ]
        );
        $user = User::find($express_order->user_id);
        $total_price = 0;
        $express_order_details = ExpressOrderDetails::where('exporder_id', $id)->get();
        $address = Address::join('districts', 'districts.id', 'addresses.district_id')->where('user_id', $express_order->user_id)->where('addresses.status', '1')->where('addresses.type', '1')->first();
        // dd($address);
        return view('admin/expressorders.print', compact('express_order', 'express_order_details', 'address', 'total_price', 'user'));
    }
}
