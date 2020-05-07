<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function checkout(Request $request){

        $discount = session()->get('coupon')['discount'];
        $coupon_code = session()->get('coupon')['name'];

        $total = Cart::total();
        $a = $total;
        $b = str_replace( ',', '', $a );

        $discounted_total = $b - ($b * ($discount/100));

         $this->validate($request, [
            'address_1' => 'required',
            'address_2' => 'required',
            'district' => 'required',

        ]);
        $role = DB::table('addresses')->insert([
            'status' => 0,
            'type' => $request->input('shipping'),
            'address_line_1' => $request->input('address_1'),
            'address_line_2' => $request->input('address_2'),
            'district_id' => $request->input('district'),
            'user_id' => Auth::id(),
        ]);
        $address = DB::getPdo()->lastInsertId();

             $order_id =  DB::table('orders')->insertGetId([
                'user_id' => Auth::id(),
                'transection_id' => rand(10,100),
                'shipping_address_id' =>$address,
                'billing_address_id' =>$address,
                'order_status_id' => '0',
                'slug' => '',
                'buyer_comment' => '',
                'seller_comment' => '',
                'admin_comment' => '',
                'total_amount' => Cart::total(),
                'discount' => $discount,
                'shipping_charge' => '0',
                'vat' => Cart::tax(),
                'service_charge' => '0',
                'total_payable' => $discounted_total,
                'applied_coupon' => $coupon_code,
            ]);
            
           foreach (Cart::content() as $value) {
               DB::table('order_details')->insert([
                'variation_id' => rand(10,100),
                'product_id' =>$value->id,
                'price' =>$value->price,
                'sale_price' => '0',
                'buying_price' => '0',
                'quantity' => $value->qty,
                'total_price' => '0',
                'order_id' => $order_id

                ]);
            }
           
            foreach (Cart::content() as $item) {
                
                  $data =DB::table('products')->where('id', $item->id )->get();

                    foreach ($data as $key) {
                    $qty = $key->stock_qty - $item->qty;
                        DB::table('products')->where('id', $key->id)->update([
                                
                                'stock_qty' => $qty
                        ]);
                                
                    }

           }

            $order_statuses = DB::table('order_statuses')->insertGetId([
            'name' => 'placed',
            'name_bn' => 'placed',
            'order_id' => $order_id
            ]);

            
            
            Cart::destroy();
        // Session::flush();
        

                 return redirect()->route('home')
                        ->with('success','Your order has been placed successfully');
        
    }
}
