<?php

namespace App\Http\Controllers;

use App\Model\Catagory;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Model\Address;
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
        $this->middleware('auth');
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
            ->leftjoin('districts', 'districts.id', 'addresses.district_id');
        if (Address::where('addresses.status', '1')->where('addresses.type', '1')->count() > 0) {
            $products = $products->where('addresses.status', '1')->where('addresses.type', '1');
        }
        $products = $products->select('products.*', 'users.name as seller_name', 'users.phone', 'districts.name as location')
            ->get();
        return view('home', compact('categories', 'products'));
    }
    public function search(Request $request)
    {

        if ($request->has('search')) {
            $request->search = $request->input('search');

            if($request->search == ''){
                return redirect()->back();
            }

            $products = Products::leftjoin('users', 'users.id', 'products.seller_id')
                ->leftjoin('addresses', 'addresses.user_id', 'products.seller_id')
                ->leftjoin('districts', 'districts.id', 'addresses.district_id');
            if (Address::where('addresses.status', '1')->where('addresses.type', '1')->count() > 0) {
                $products = $products->where('addresses.status', '1')->where('addresses.type', '1');
            }
            $products = $products->select('products.*', 'users.name as seller_name', 'users.phone', 'districts.name as location')
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
                ->get();

            return view('search', compact('products'));
        }else{
            return redirect()->back();
        }
    }
}
