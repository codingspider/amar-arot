<?php

namespace App\Http\Controllers;

use App\Model\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatagoryController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:catagory-list|catagory-create|catagory-edit|catagory-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:catagory-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:catagory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:catagory-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $catagories = Catagory::paginate(5);
         return view('catagories.index', compact('catagories'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Catagory::all();
        return view('catagories.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request); 

        $this->validate($request, [
            'name' => 'required',
            'name_bn' => 'required',
        ]);


        $role = Catagory::create([
            'name' => $request->input('name'),
            'name_bn' => $request->input('name_bn'),
            'main_catagory_id' => $request->input('main_catagory_id'),
            
            ]);

        return redirect()->route('catagories.index')
                        ->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Catagory::find($id);

        return view('catagories.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = Catagory::find($id);
         $category = Catagory::all();

        return view('catagories.edit', compact('data','category'));
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


        $role = Catagory::where('id', $id)->update([
            'name' => $request->input('name'),
            'name_bn' => $request->input('name_bn'),
            'main_catagory_id' => $request->input('main_catagory_id'),
            
            ]);

        return redirect()->route('catagories.index')
                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("catagories")->where('id',$id)->delete();
        return redirect()->route('catagories.index')
                        ->with('success','Category deleted successfully');
    }
}
