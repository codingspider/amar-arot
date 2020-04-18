@extends('layouts.app')
@section('pagetitle','Orders-AmarBazar')

@section('contents')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center light-blue-text">{{__('welcome.Amar Bazar')}}</h1>
      <div class="row center">
        <h5 class="header col s12 light">{{__('order.Your orders')}}</h5>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 z-depth-1">
          <h5>{{__('order.Sales Orders')}}</h5>
          <table class="responsive-table">
            <thead>
              <tr>
                <th>{{__('order.Order no')}}</th>
                <th>{{__('order.Date')}}</th>
                <th>{{__('order.Price')}}</th>
                <th>{{__('order.Status')}}</th>
                <th class="center">{{__('order.Details')}}</th>
                <th class="center">{{__('order.Sales Arrangement')}}</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>BUY001001</td>
                <td>12-12-2020</td>
                <td>১৫০{{__('cart.Taka')}}</td>
                <td>{{__('order.Confired')}}</td>
                <td class="center"><a href="{{url('details')}}" class="btn btn-sm light-blue">{{__('order.Details')}}</a></td>
                <td class="center"><button class="btn btn-sm green">{{__('order.Shipment')}}</button></td>
              </tr>
              <tr>
                <td>BUY001002</td>
                <td>12-12-2020</td>
                <td>১৫০{{__('cart.Taka')}}</td>
                <td>{{__('order.Not Confired')}}</td>
                <td class="center"><a href="{{url('details')}}" class="btn btn-sm light-blue">{{__('order.Details')}}</a></td>
                <td class="center"><button class="btn btn-sm green">{{__('order.Confired Order')}}</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col s12 z-depth-1">
          <h5>{{__('order.Purchase Orders')}}</h5>
          <table class="responsive-table">
            <thead>
              <tr>
                <th>{{__('order.Order no')}}</th>
                <th>{{__('order.Date')}}</th>
                <th>{{__('order.Price')}}</th>
                <th>{{__('order.Status')}}</th>
                <th>{{__('order.Details')}}</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>BUY001001</td>
                <td>12-12-2020</td>
                <td>১৫০{{__('cart.Taka')}}</td>
                <td>{{__('order.In the Courier')}}</td>
                <td><a href="{{url('details')}}" class="btn btn-sm light-blue">{{__('order.Details')}}</a></td>
              </tr>
              <tr>
                <td>BUY001002</td>
                <td>12-12-2020</td>
                <td>১৫০{{__('cart.Taka')}}</td>
                <td>{{__('order.Not Confired')}}</td>
                <td><a href="{{url('details')}}" class="btn btn-sm light-blue">{{__('order.Details')}}</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br><br>
  </div>

  <div id="add_product" class="side_add_product sidenav">
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s12">
            <input id="first_name" type="text" class="validate">
            <label for="first_name">{{__('product.Product Name')}}</label>
          </div>
          <div class="input-field col s12">
            <input id="last_name" type="text" class="validate">
            <label for="last_name">{{__('product.Selling Price')}}</label>
          </div>
          <div class="input-field col s12">
            <input id="last_nam" type="text" class="validate">
            <label for="last_nam">{{__('product.Stock')}}</label>
          </div>
          <div class="input-field col s12">
            <input id="last_na" type="text" class="validate">
            <label for="last_na">{{__('product.Transportation Cost')}}</label>
          </div>
          <div class="input-field col s12">
            <input id="last_n" type="text" class="validate">
            <label for="last_n">{{__('product.Minimum Sales amount')}}</label>
          </div>
          <div class="file-field col s12 input-field">
            <div class="btn light-blue">
              <span>{{__('product.Photo')}}</span>
              <input type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
          <div class="col s12 center">
            <button class="btn light-blue" type="submit">{{__('product.Save')}}</button>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection
