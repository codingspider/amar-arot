<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// All rout is for test Purpose

use Illuminate\Support\Facades\DB;

Route::get('locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});
// Route::get('lang/{locale}','localization@view')->name('lang');


Route::get('/', function () {
    return view('welcome');
});
// Route::get('login', function () {
//     return view('auth.login');
// });
// Route::get('purchases', function () {
//     return view('purchases.index');
// });
// Route::get('cart', function () {
//     return view('carts.show');
// });
// Route::get('sales', function () {
//     return view('sales.index');
// });
// Route::get('orders', function () {
//     return view('orders.index');
// });
// Route::get('details', function () {
//     return view('orders.show');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::post('catagories/update', 'CatagoryController@update');
    Route::post('products/update', 'ProductController@update');
    Route::resource('products', 'ProductController');
    Route::resource('catagories', 'CatagoryController');
    Route::resource('measurments', 'MeasurmentController');
    Route::post('measurments/update', 'MeasurmentController@update');
    Route::resource('profiles', 'ProfileController');
    Route::get('add-address/{type}', 'ProfileController@addAddress');
    Route::post('store-address', 'ProfileController@storeAddress');
    Route::post('update-address', 'ProfileController@updateAddress');
    Route::get('edit-address/{id}', 'ProfileController@editAddress');
    Route::get('active-address/{id}', 'ProfileController@activeAddress');
    Route::get('delete-address/{id}', 'ProfileController@deleteAddress');
    Route::resource('settings', 'SettingController');
    Route::resource('headers', 'HeaderController');
    Route::resource('socials', 'SocialController');
    Route::resource('profiles', 'ProfileController');
    Route::resource('sales', 'SalerProductController');
});
