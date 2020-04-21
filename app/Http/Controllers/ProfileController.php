<?php

namespace App\Http\Controllers;

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
        $addresses = DB::table('addresses')->join('districts','districts.id','addresses.district_id')->where('user_id', $profile->id)->where('status', 1)->get();
        return view('profile.index', compact('profile','addresses','districts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profile)
    {
        $addresses = DB::table('addresses')->where('user_id', $profile->id)->where('status', 1)->get();
        $districts = DB::table('districts')->get();
        return view('profile.edit', compact('profile', 'addresses', 'districts'));
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



        return back();
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
