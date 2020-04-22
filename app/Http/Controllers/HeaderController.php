<?php

namespace App\Http\Controllers;

use App\Model\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  DB::table('headers')
        ->join('users', 'headers.updated_by', '=', 'users.id')
        ->select('headers.*', 'users.*')
        ->get();

        return view('setting.header_index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.create_header');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax())
     {
      $rules = array(
       'name.*'  => 'required',
       'name_bn.*'  => 'required',
       'links.*'  => 'required',
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

      $name = $request->name;
      $name_bn = $request->name_bn;
      $links = $request->links;
      for($count = 0; $count < count($name); $count++)
      {
       $data = array(
        'title' => $name[$count],
        'title_bn'  => $name_bn[$count],
        'links'  => $links[$count],
        'updated_by'  => Auth::id()
       );
       $insert_data[] = $data; 
      }

      Header::insert($insert_data);
      return response()->json([
       'success'  => 'Data Added successfully.'
      ]);
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
       $data = Header::find($id);
        return view('setting.header_edit', compact('data')); 
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
      
         $data =  $request->validate([
            'title' => 'required',
            'ttile_bn' => 'required',
            'links' => 'required',
           ]);

        //    dd($data);
      $result =  Header::where('id', $id)->update([
            'title' => $request->title,
            'title_bn' => $request->ttile_bn,
            'links' => $request->links,
        ]);

        // dd($result); 

         return back()->with('success', 'Post has been updated! ');
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
