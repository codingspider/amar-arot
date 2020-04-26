<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CouponsMangeController extends Controller
{

     function __construct()
    {
        $this->middleware('permission:coupon-list|coupon-create|coupon-edit|coupon-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:coupon-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:coupon-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:coupon-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Coupon::all();
        return view('coupons.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules = array(
           'code' => 'required',
            'type' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Session::flash('alert-warning', 'Please check the input fields. ');
            return back();
        }
        else {
            $role = Coupon::create([
            'code' => $request->input('code'),
            'type' => $request->input('type'),
            'value' => $request->input('value'),
            'percent_off' => $request->input('percent_off'),
            
            ]);

        return redirect()->route('coupons.index')
                        ->with('success','Coupon created successfully');
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
        $data = Coupon::find($id);
        return view('coupons.edit', compact('data'));
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
        $rules = array(
           'code' => 'required',
            'type' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Session::flash('alert-warning', 'Please check the input fields. ');
            return back();
        }
        else {
            $role = Coupon::where('id', $id)->update([
            'code' => $request->input('code'),
            'type' => $request->input('type'),
            'value' => $request->input('value'),
            'percent_off' => $request->input('percent_off'),
            
            ]);

        return redirect()->route('coupons.index')
                        ->with('success','Coupon updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Coupon::find($id);
        $data->delete();
        return redirect()->route('coupons.index')
                        ->with('success','Coupon delete successfully');
    }
}
