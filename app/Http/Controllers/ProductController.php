<?php

namespace App\Http\Controllers;

use App\Model\Products;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = Products::latest()->paginate(5);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'name'=>'required',
            // 'catagory_id'=>'required',
            // 'price'=>'required',
            // 'stock_qty'=>'required',
            // 'description'=>'required',
            // 'short_description'=>'required',
            // 'name_bn'=>'required',
            'images' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:3000'
        );

        if($request->has('images')){
          
            $originalImage= $request->file('images');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/uploads/';
            $originalPath = public_path().'/images/';
            $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
            $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());
            $thumbnailImage->resize(150,150);
            $image_name=time().$originalImage->getClientOriginalName();
        }
        
        $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             Session::flash('alert-warning', 'Please check the input fields. ');
             return back();
            } else {
                
                $data = array(
                
                    "name"=> $request->name,
                    "name_bn"=> $request->name_bn,
                    "price"=> $request->price,
                    "stock_qty"=> $request->stock_qty,
                    "rating"=> $request->rating,
                    "rating_by"=> $request->rating_by,
                    "sale_price"=> $request->sale_price,
                    "product_code"=> $request->product_code,
                    "variation_type"=>  $request->variation_type,
                    "description_bn"=> $request->description_bn,
                    "short_description"=> $request->short_description,
                    "description"=> $request->description,
                    "short_description_bn"=> $request->short_description_bn,
                    "measurment_unit_id"=> $request->mesurment_id,
                    "catagory_id"=> $request->cat_id,
                    "seller_id"=> $request->seller_id,
                    "image"=>  $image_name
                );
                $posts = Products::create($data);
                Session::flash('alert-success', 'Post has been added successfully');
                return back();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        return view('products.show',compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        // dd($product); 
        
        // $product = Products::where('id',$product);

        // dd($product); 
        return view('products.edit',compact('product'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
             $rules = array(
            'name'=>'required',
            // 'catagory_id'=>'required',
            // 'price'=>'required',
            // 'stock_qty'=>'required',
            // 'description'=>'required',
            // 'short_description'=>'required',
            // 'name_bn'=>'required',
            // 'images' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:3000'
        );

        if($request->has('images')){
          
            $originalImage= $request->file('images');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/uploads/';
            $originalPath = public_path().'/images/';
            $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
            $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());
            $thumbnailImage->resize(150,150);
            $image_name=time().$originalImage->getClientOriginalName();

             $posts = Products::where('id', $request->id)->update([
                 'image' => $image_name
             ]);
        }
        
        $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             Session::flash('alert-warning', 'Please check the input fields. ');
             return back();
            } else {

                $posts = Products::where('id', $request->id)->update(
                    [
                    "name"=> $request->name,
                    "name_bn"=> $request->name_bn,
                    "price"=> $request->price,
                    "stock_qty"=> $request->stock_qty,
                    "rating"=> $request->rating,
                    "rating_by"=> $request->rating_by,
                    "sale_price"=> $request->sale_price,
                    "product_code"=> $request->product_code,
                    "variation_type"=>  $request->variation_type,
                    "description_bn"=> $request->description_bn,
                    "short_description"=> $request->short_description,
                    "description"=> $request->description,
                    "short_description_bn"=> $request->short_description_bn,
                    "measurment_unit_id"=> 1,
                    "catagory_id"=> 2,
                    "seller_id"=> 3,
                    ]
                );
                Session::flash('alert-success', 'Post has been added successfully');
                return back();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();


        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
