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

        $rules = array(
            'site_title' => 'required'

        );

        $messages = array(
            'required' => 'The :attribute field is required',

        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {

            $insert_array = [
                'site_title'     => $request->get('site_title'),
                'copyright' => $request->get('copyright'),
                'admin_email'    => $request->get("admin_email"),
                'description'   => $request->get('description'),
                'seo_title'       => $request->get('seo_title'),
                'seo_keywords'   => $request->get('seo_keywords'),
                'contact_address'    => $request->get('contact_address'),
                'contact_email'    => $request->get('contact_email'),
                'contact_phone'    => $request->get('contact_phone'),
                'about'    => $request->get('about')
            ];

            if ($request->has('images')) {
                $originalImage = $request->file('images');
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = public_path() . '/uploads/';
                $originalPath = public_path() . '/images/';
                $image_name = time() . $originalImage->getClientOriginalName();
                $thumbnailImage->save($originalPath . $image_name);
                $thumbnailImage->resize(150, 150)->save($thumbnailPath . $image_name);
                $insert_array['image'] = $image_name;

                $var = Setting::first();
                $old_image_t = $thumbnailPath . '/' . $var->image;
                $old_image_o = $originalPath . '/' . $var->image;

                if(file_exists($old_image_t)){
                    unlink($old_image_t);
                }
                if(file_exists($old_image_o)){
                    unlink($old_image_o);
                }
            } 

            $newUser = Setting::updateOrCreate(
                ['id'   => 1], $insert_array );

            return back()->with('success', 'Setting saved');
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
