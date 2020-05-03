<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount = session()->get('coupon')['discount'];


        $total = Cart::total();
        $a = $total;
        $b = str_replace(',', '', $a);

        $discounted_total = $b - ($b * ($discount / 100));


        // Session::put('shiping_id', $shiping_id);

        return view('carts.show')->with([

            'discount' => $discount,
            'address' => $discounted_total,
            'newSubtotal' => $discounted_total,

        ]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->seller_id);

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('home')->with('success', 'Item is already in your cart!');
        }

        else if(Session::get('seller_id') == $request->seller_id && count(Cart::content()) > 0){

            Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'qty' => 1,
                'price' => $request->price,
                'weight' => 1,
                'options' => [
                    'size' => $request->seller_id
                ]
            ])->associate('App\Model\Products');
            return redirect()->route('home')->with('success', 'Item has been added');
        }
        else if(count(Cart::content()) < 1) {

            Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'qty' => 1,
                'price' => $request->price,
                'weight' => 1,
                'options' => [
                    'size' => $request->seller_id
                ]
            ])->associate('App\Model\Products');

            Session::put('seller_id', $request->seller_id);

            return redirect()->route('home')->with('success', 'Item has been added in your cart!');

        } else {
            return redirect()->route('home')->with('warning', 'please buy from same seller');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
            return response()->json(['success' => false], 400);
        }

        // if ($request->quantity > $request->productQuantity) {
        //     session()->flash('errors', collect(['We currently do not have enough items in stock.']));
        //     return response()->json(['success' => false], 400);
        // }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success', 'Item has been removed from your cart. ');
    }

    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already Saved For Later!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Model\Products');

        return redirect()->route('cart.index')->with('success_message', 'Item has been Saved For Later!');
    }

    public function checkout (){
        $address = DB::table('addresses')
        ->join('users', 'users.id', 'addresses.user_id')
        ->select('users.*', 'addresses.*')
        ->where('user_id', Auth::id())->orderBy('addresses.id','desc')->first();
        // dd($address);
        $discount = session()->get('coupon')['discount'];
        $total = Cart::total();

        $district = DB::table('districts')->get();



        $a = $total;
        $b = str_replace(',', '', $a);

        $discounted_total = $b - ($b * ($discount / 100));


        return view('cart.checkout')->with([

            'discount' => $discount,
            'newSubtotal' => $discounted_total,
            'address' => $address,
            'district' => $district,
        ]);
    }
}
