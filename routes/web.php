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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', function () {
    return view('auth.login');
});
Route::get('purchases', function () {
    return view('purchases.index');
});
Route::get('cart', function () {
    return view('carts.show');
});
Route::get('sales', function () {
    return view('sales.index');
});
Route::get('orders', function () {
    return view('orders.index');
});
Route::get('details', function () {
    return view('orders.show');
});
