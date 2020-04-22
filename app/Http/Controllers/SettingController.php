<?php

namespace App\Http\Controllers;

use Validator;
use App\Model\Social;
use App\Model\Setting;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
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
        $var = Setting::first();


        return view('setting.create_setting', compact('var'));
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

        $data = request()->except(['_token']);
        $var = Setting::first();

        // dd($var);

        $rules = array(
            'site_title'=>'required',
            'admin_email'=>'required',
            'contact_address'=>'required',
            'description'=>'required',
            'seo_keywords'=>'required',
            // 'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3000'
   
        );

        $messages = array(
            'required' => 'The :attribute field is required',
          
        );

        $validator = Validator::make($request->all(), $rules, $messages);

         if ($validator->fails()) {
                 return Redirect::back()->withErrors($validator);
            } else {
                if ($request->has('images')) {
                $originalImage = $request->file('images');
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = public_path() . '/uploads/';
                $originalPath = public_path() . '/images/';
                $image_name = time() . $originalImage->getClientOriginalName();
                $thumbnailImage->save($originalPath . $image_name);
                $thumbnailImage->resize(150, 150)->save($thumbnailPath . $image_name);
            }else {
                $image_name ='no image';
            }

                $newUser = Setting::updateOrCreate([
                    'updated_by'   => Auth::user()->id,
                ],[
                    'site_title'     => $request->get('site_title'),
                    'copyright' => $request->get('copyright'),
                    'admin_email'    => $request->get("admin_email"),
                    'description'   => $request->get('description'),
                    'seo_title'       => $request->get('seo_title'),
                    'seo_keywords'   => $request->get('seo_keywords'),
                    'contact_address'    => $request->get('contact_address'),
                    'contact_email'    => $request->get('contact_email'),
                    'contact_phone'    => $request->get('contact_phone'),
                    'about'    => $request->get('about'),
                    'image'    => $image_name
                ]);

                 return back()->with('success','Setting saved');
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
        //
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
