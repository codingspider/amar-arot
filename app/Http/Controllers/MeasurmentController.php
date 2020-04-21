<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\MeasurmentUnit;
use Illuminate\Support\Facades\DB;

class MeasurmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $measurments = MeasurmentUnit::paginate(10);
         return view('measurments.index', compact('measurments'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('measurments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_bn' => 'required',
        ]);


        $role = MeasurmentUnit::create([
            'name' => $request->input('name'),
            'name_bn' => $request->input('name_bn'),
            
            ]);

        return redirect()->route('measurments.index')
                        ->with('success','Measurment unit created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MeasurmentUnit::find($id);

        return view('measurments.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id; 
        $this->validate($request, [
            'name' => 'required',
            'name_bn' => 'required',
        ]);


        $role = MeasurmentUnit::where('id', $id)->update([
            'name' => $request->input('name'),
            'name_bn' => $request->input('name_bn'),
            
            ]);

        return redirect()->route('measurments.index')
                        ->with('success','Measurment unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table("measurment_units")->where('id',$id)->delete();
        return redirect()->route('measurments.index')
                        ->with('success','Measurement deleted successfully');
    }
}
