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

use Gloudemans\Shoppingcart\Facades\Cart;

// This Route For Language Change
Route::get('locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});

// This for Authentication
Auth::routes();

//
Route::get('orders/', 'OrderController@all_orders');
Route::get('order/details/{id}', 'OrderController@order_details');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('details/{id}', 'HomeController@show')->name('details');


// Admin Route
Route::group(['prefix' => 'admin','as'=>'admin.',  'middleware' => 'auth'],function(){
    route::resource('express-orders','Admin\ExpressOrderController');
    route::get('print-express-order/{id}','ExpressOrderConfiramtionController@printExpressOrder')->name('print_express_order');

});

// Authenticate User Route
Route::group(['middleware' => ['auth']], function () {
    Route::get('all/orders/for/admin', 'OrderController@order_list');
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
    Route::get('checkout', 'CartController@checkout');
    Route::resource('coupons', 'CouponsMangeController');
    Route::post('confirm/order', 'CheckoutController@checkout');
    Route::resource('express-orders', 'ExpressOrderController');
    Route::post('ajax/express-orders-product-list', 'ExpressOrderController@ajaxProductListRequest');
    Route::get('orders/lists/fors/admins', 'OrderController@get_order_list');
    Route::get('all/orders/for/details/order/view/{id}', 'OrderController@get_order_details');
    Route::post('change/order/status/form', 'OrderController@status_change_done');
    Route::get('order/status/change/{id}', 'OrderController@order_status_change');
    Route::get('re-order/{id}', 'OrderController@re_order');
    Route::get('expess-order-confiramtion/{id}', 'ExpressOrderConfiramtionController@orderConfiramtion')->name('orderconfiramtion');


});

Route::get('empty', function () {
    Cart::destroy();
});

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');

Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');
