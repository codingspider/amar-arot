<?php

namespace App\Http\Controllers;

use App\Model\Address;
use App\Model\District;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $profile)
    {
        $billing = Address::join('districts', 'districts.id', 'addresses.district_id')->where('user_id', Auth::user()->id)->where('type', "0")->where('status', "1")->select('addresses.id', 'addresses.address_line_1', 'addresses.address_line_2', 'addresses.type', 'districts.name')->first();

        $shipping = Address::join('districts', 'districts.id', 'addresses.district_id')->where('user_id', Auth::user()->id)->where('type', "1")->where('status', "1")->select('addresses.id', 'addresses.address_line_1', 'addresses.address_line_2', 'addresses.type', 'districts.name')->first();

        $billing_histories = Address::join('districts', 'districts.id', 'addresses.district_id')->where('user_id', Auth::user()->id)->where('type', "0")->where('status', "0")->select('addresses.id', 'addresses.address_line_1', 'addresses.address_line_2', 'addresses.type', 'districts.name')->get();

        $shipping_histories = Address::join('districts', 'districts.id', 'addresses.district_id')->where('user_id', Auth::user()->id)->where('type', "1")->where('status', "0")->select('addresses.id', 'addresses.address_line_1', 'addresses.address_line_2', 'addresses.type', 'districts.name')->get();

        // return $billing_histories;
        return view('profile.index', compact('profile', 'billing', 'shipping', 'billing_histories', 'shipping_histories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profile)
    {

        $this->validate($request, [
            'name' => 'required|max:30',
            'name_bn' => 'required',
            'phone' => 'required',
        ]);

        DB::table('users')
            ->where('id', $profile->id)
            ->update(["name" => $request->name, "name_bn" => $request->name_bn, "website" => $request->website, "facebook" => $request->facebook, "phone" => $request->phone,]);
        return redirect(route('profiles.show', Auth::user()->id));
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
    public function addAddress($type)
    {
        $districts = District::all();
        return view('addresses.create', compact('type', 'districts'));
    }
    public function storeAddress(Request $request)
    {
        $this->validate($request, [
            'address_line_1' => 'required|max:255',
            'address_line_2' => 'max:255',
            'type' => 'required',
            'district_id' => 'required',
        ]);
        if ($request->type == 'billing') {
            $type = $request->type = '0';
        } else {
            $type = $request->type = '1';
        }
        $address = [
            "address_line_1" => $request->address_line_1,
            "address_line_2" => $request->address_line_2,
            "district_id" => $request->district_id,
            "status" => "1",
            "type" => $type,
            "user_id" => Auth::user()->id,
        ];
        Address::where('user_id', Auth::user()->id)->where('type', $type)->update(['status' => '0']);
        Address::create($address);

        return redirect(route('profiles.show', Auth::user()->id));
    }

    public function editAddress($id)
    {
        $address = Address::find($id);
        $districts = District::all();

        return view('addresses.edit', compact('address', 'districts'));
    }

    public function updateAddress(Request $request)
    {
        $this->validate($request, [
            'address_line_1' => 'required|max:255',
            'address_line_2' => 'max:255',
            'type' => 'required',
            'district_id' => 'required',
        ]);

        $address = $request->except('_token', 'type');
        Address::where('id', $request->id)->update($address);
        return redirect(route('profiles.show', Auth::user()->id));
    }
    public function activeAddress($id)
    {
        $type = Address::where('id', $id)->select('type')->first();
        Address::where('user_id', Auth::user()->id)->where('status', '1')->where('type', $type->type)->update(['status' => '0']);
        Address::where('id', $id)->update(['status' => '1']);
        return back();
    }

    public function deleteAddress($id)
    {
        Address::where('id', $id)->delete();
        return back();
    }
}
