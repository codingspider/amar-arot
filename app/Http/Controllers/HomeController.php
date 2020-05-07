<?php

namespace App\Http\Controllers;

use App\ExpressOrder;
use App\ExpressOrderDetails;
use App\Model\Catagory;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Model\Address;
use App\Model\MeasurmentUnit;
use App\User;
use Dotenv\Validator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Catagory::all();
        $products = Products::leftjoin('users', 'users.id', 'products.seller_id')
            ->leftjoin('addresses', 'addresses.user_id', 'products.seller_id')
            ->leftjoin('districts', 'districts.id', 'addresses.district_id')
            ->leftjoin('measurment_units','measurment_units.id','products.measurment_unit_id');
        if (Address::where('addresses.status', '1')->where('addresses.type', '1')->count() > 0) {
            $products = $products->where('addresses.status', '1')->where('addresses.type', '1');
        }
        $products = $products->select('products.*', 'products.id as p_id', 'users.name as seller_name', 'users.phone', 'districts.name as location','measurment_units.name as unit')->latest()->get();

        // dd($products);
        return view('home', compact('categories', 'products'));
    }
    public function search(Request $request)
    {

        if ($request->has('search')) {
            $request->search = $request->input('search');

            if ($request->search == '') {
                return redirect()->back();
            }

            $products = Products::leftjoin('users', 'users.id', 'products.seller_id')
                ->leftjoin('addresses', 'addresses.user_id', 'products.seller_id')
                ->leftjoin('districts', 'districts.id', 'addresses.district_id')
                ->leftjoin('measurment_units','measurment_units.id','products.measurment_unit_id');;
            if (Address::where('addresses.status', '1')->where('addresses.type', '1')->count() > 0) {
                $products = $products->where('addresses.status', '1')->where('addresses.type', '1');
            }
            $products = $products->join('catagories', 'catagories.id', 'products.catagory_id')->select('products.*', 'users.name as seller_name', 'users.phone', 'districts.name as location', 'catagories.name as cat_name','measurment_units.name as unit')
                ->orWhere('products.name', 'like', '%' . $request->search . '%')
                ->orWhere('products.name_bn', 'like', '%' . $request->search . '%')
                ->orWhere('products.price', 'like', '%' . $request->search . '%')
                ->orWhere('products.product_code', 'like', '%' . $request->search . '%')
                ->orWhere('products.description', 'like', '%' . $request->search . '%')
                ->orWhere('products.description_bn', 'like', '%' . $request->search . '%')
                ->orWhere('products.short_description', 'like', '%' . $request->search . '%')
                ->orWhere('products.short_description_bn', 'like', '%' . $request->search . '%')
                ->orWhere('users.name', 'like', '%' . $request->search . '%')
                ->orWhere('districts.name', 'like', '%' . $request->search . '%')
                ->orWhere('catagories.name', 'like', '%' . $request->search . '%')
                ->get();

            return view('search', compact('products'));
        } else {
            return redirect()->back();
        }
    }
    public function show($id)
    {
        $product_details = Products::find($id);

        if (isset($product_details->catagory_id)) {
            $categories = Catagory::find($product_details->catagory_id);
            $measurmentUnit = MeasurmentUnit::find($product_details->catagory_id);

            // dd($categories);
        }
        if (isset($product_details->seller_id)) {
            $user = User::select('id', 'name', 'name_bn', 'phone')->find($product_details->seller_id);
            $address = Address::join('districts', 'districts.id', 'addresses.district_id')->where('user_id', $user->id)->where('type', '1')->where('status', '1')->select('districts.name', 'districts.name_bn')->first();
        }


        $products = Products::where('catagory_id', $product_details->catagory_id)->latest()->take(4)->get();
        return view('show', compact('products', 'product_details', 'categories', 'measurmentUnit', 'user', 'address'));
    }

}
