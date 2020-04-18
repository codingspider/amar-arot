@extends('layouts.app')
@section('pagetitle','Order-AmarBazar')

@section('contents')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center light-blue-text">{{__('welcome.Amar Bazar')}}</h1>
      <div class="row center">
        <h5 class="header col s12 light">{{__('order.Your order details')}}</h5>

      </div>
    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row z-depth-1">
        <div class="col s12 m4">
          <p>
            {{__('order.Buyer Name')}} করিম উদ্দিন <br>
            {{__('product.Phone')}} ০১৭২২২২২২২২২২২ <br>
            {{__('order.Address')}} ঢাকা।
          </p>
          </td>
        </div>
        <div class="col s12 m4">
          <p>
            {{__('order.Saler Name')}} রহিম উদ্দিন <br>
            {{__('product.Phone')}} ০১৭৩৩৩৩৩৩৩৩৩৩ <br>
            {{__('order.Address')}} ঠাকুর গাঁও
          </p>
          </td>
        </div>
        <div class="col s12 m4">
          <p>
            {{__('order.Status')}}: কুরিয়ারে আছে <br>
            {{__('order.Order no')}}: BUY001001 <br>
            {{__('order.Note')}} {{__('order.Booking memo no')}} ১২৪৮
          </p>
          </td>
        </div>
      </div>

      <div class="row">
        <div class="col s12 z-depth-1">
          <table class="responsive-table">
            <thead>
              <tr>
                <th>{{__('product.Product Name')}}</th>
                <th>{{__('cart.Quantity')}}</th>
                <th>{{__('cart.Unit Price')}}</th>
                <th>{{__('cart.Sub Total')}}</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>আম</td>
                <td>২০{{__('cart.Kg')}}</td>
                <td>১৫০{{__('cart.Taka')}}</td>
                <td>৩০০০{{__('cart.Taka')}}</td>
              </tr>
              <tr>
                <td>আম</td>
                <td>২০{{__('cart.Kg')}}</td>
                <td>১৫০{{__('cart.Taka')}}</td>
                <td>৩০০০{{__('cart.Taka')}}</td>
              </tr>
              <tr>
                <td>আম</td>
                <td>২০{{__('cart.Kg')}}</td>
                <td>১৫০{{__('cart.Taka')}}</td>
                <td>৩০০০{{__('cart.Taka')}}</td>
              </tr>
            </tbody>
          </table>
          <p class="center">{{__('cart.Total')}}৯০০০{{__('cart.Taka')}}</p>
        </div>
      </div>
    </div>
    <br><br>
  </div>

  @endsection
