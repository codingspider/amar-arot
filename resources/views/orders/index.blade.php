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
              @if (count($slae_orders) > 0)
                  
              @foreach ($slae_orders as $item)
                  
              <tr>
                <td>BUY00{{$item->id }}</td>
              <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                <td>{{ $item->total_payable }} {{__('cart.Taka')}}</td>
                <td>{{ $item->status }}</td>
                <td class="center"><a href="{{url('details')}}" class="btn btn-sm light-blue">{{__('order.Details')}}</a></td>
                <td class="center"><button class="btn btn-sm green">{{__('order.Shipment')}}</button></td>
              </tr>
              @endforeach

              @else 
              <h4>You have no orders!</h4>
              @endif

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
                <th>{{__('order.Price')}} {{ __('cart.vat')}}</th>
                <th>{{__('order.Status')}}</th>
                <th>{{__('order.Details')}}</th>
              </tr>
            </thead>

            <tbody>
              @if (count($orders) > 0)
                     @php
                        $sum = 0;
                    @endphp
              @foreach ($orders as $item)
                  
              <tr>
                <td>BUY00{{$item->id }}</td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                <td>{{ $act_points =  $item->total_payable }} {{__('cart.Taka')}}</td>
                <td>{{ $item->status }}</td>
                <td><a href="{{url('order/details/'.$item->id )}}" class="btn btn-sm light-blue">{{__('order.Details')}}</a></td>
                @if ($item->status == 'Cancelled')
                <td><a href="{{url('re-order/'.$item->status_id )}}" class="btn btn-sm light-yellow">Re-Order</a></td>
                @endif
              </tr>
              @endforeach

              @else 
              <h4>You have no orders!</h4>
              @endif
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
