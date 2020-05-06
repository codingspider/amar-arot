<?php

namespace App\Http\Controllers;

use App\Model\Address;
use App\Model\Products;
use App\Model\MeasurmentUnit;
use App\Model\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class SalerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::leftjoin('users', 'users.id', 'products.seller_id')
            ->leftjoin('addresses', 'addresses.user_id', 'products.seller_id')
            ->leftjoin('districts', 'districts.id', 'addresses.district_id')
            ->where('seller_id', Auth::user()->id);
        if (Address::where('addresses.status', '1')->where('addresses.type', '1')->count() > 0) {
            $products = $products->where('addresses.status', '1')->where('addresses.type', '1');
        }
        $products = $products->select('products.*', 'users.name as seller_name', 'users.phone', 'districts.name as location')->get();

        $measurements = MeasurmentUnit::all();
        $categories = Catagory::all();
        return view('sales.index', compact('measurements', 'categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            "name"                 => 'required|max:100',
            "name_bn"              => 'max:100',
            "price"                => 'required|regex:/^\d+(\.\d{1,2})?$/',
            "sale_price"           => 'regex:/^\d+(\.\d{1,2})?$/|max:8',
            "stock_qty"            => 'required|regex:/^\d+(\.\d{1,2})?$/',
            "short_description"    => 'max:100',
            "description"          => 'max:1000',
            "short_description_bn" => 'max:100',
            "description_bn"       => 'max:1000',
            "measurment_unit_id"   => 'required',
            "catagory_id"          => 'required',
        ]);
        $input = $request->except('_token', 'image');
        $input['seller_id'] = Auth::user()->id;
        $produt = Products::create($input);
        if ($produt && $request->has('image')) {
            $originalImage  = $request->file('image');
            // dd($originalImage->getClientOriginalExtension());
            if (
                $originalImage->getClientOriginalExtension() == 'jpg' || $originalImage->getClientOriginalExtension() == 'JPG' || $originalImage->getClientOriginalExtension() == 'png' ||
                $originalImage->getClientOriginalExtension() == 'gif' || $originalImage->getClientOriginalExtension() == 'jpeg' || $originalImage->getClientOriginalExtension() == 'JPEG' || $originalImage->getClientOriginalExtension() == 'PNG' || $originalImage->getClientOriginalExtension() == 'GIF' || $originalImage->getClientOriginalExtension() == 'WebP'
            ) {
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath  = public_path() . '/uploads/';
                $originalPath   = public_path() . '/images/';
                $image_name     = time() . $originalImage->getClientOriginalName();
                $thumbnailImage->save($originalPath . $image_name);
                $thumbnailImage->resize(400, 400)->save($thumbnailPath . $image_name);
                $produt->image = $image_name;
                $produt->save();
            } else {
                return back()->with('success', 'Image extention Must be \'JPG\' \'JPEG\' \'GIF\'');
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $sale)
    {
        // return $sale;
        $measurements = MeasurmentUnit::all();
        $categories = Catagory::all();
        return view('sales.edit', compact('sale', 'measurements', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $sale)
    {
        $this->validate($request, [
            "name"                 => 'required|max:100',
            "name_bn"              => 'max:100',
            "price"                => 'required|regex:/^\d+(\.\d{1,2})?$/',
            "sale_price"           => 'regex:/^\d+(\.\d{1,2})?$/|max:8',
            "stock_qty"            => 'required|regex:/^\d+(\.\d{1,2})?$/',
            "short_description"    => 'max:100',
            "description"          => 'max:1000',
            "short_description_bn" => 'max:100',
            "description_bn"       => 'max:1000',
            "measurment_unit_id"   => 'required',
            "catagory_id"          => 'required',
        ]);
        $input = $request->except('_token', '_method');
        $input['seller_id'] = Auth::user()->id;
        $sale->update($input);

        if ($sale->image && $request->has('image')) {
            $originalImage  = $request->file('image');
            if (
                $originalImage->getClientOriginalExtension() == 'jpg' || $originalImage->getClientOriginalExtension() == 'JPG' || $originalImage->getClientOriginalExtension() == 'png' ||
                $originalImage->getClientOriginalExtension() == 'gif' || $originalImage->getClientOriginalExtension() == 'jpeg' || $originalImage->getClientOriginalExtension() == 'JPEG' || $originalImage->getClientOriginalExtension() == 'PNG' || $originalImage->getClientOriginalExtension() == 'GIF' || $originalImage->getClientOriginalExtension() == 'WebP'
            ) {
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath  = public_path() . '/uploads/';
                $originalPath   = public_path() . '/images/';
                $image_name     = time() . $originalImage->getClientOriginalName();
                $thumbnailImage->save($originalPath . $image_name);
                $thumbnailImage->resize(400, 400)->save($thumbnailPath . $image_name);
                $sale->image = $image_name;
                $sale->save();
            } else {
                return back()->with('error', 'Image extention Must be \'JPG\' \'JPEG\' \'GIF\'');
            }
        }
        return back();
        return redirect(route('sales.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $sale)
    {
        $sale->delete();
        return redirect(route('sales.index'));
    }
}
