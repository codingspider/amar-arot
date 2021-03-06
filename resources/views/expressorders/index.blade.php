@extends('layouts.app')
@section('pagetitle','Orders-AmarArot')

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
                <h5><a href="{{route('express-orders.create')}}" class="btn">{{__('order.New Order')}}</a></h5>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>{{__('order.Order no')}}</th>
                            <th>{{__('order.Date')}}</th>
                            <th>{{__('order.Status')}}</th>
                            <th>{{__('order.Confirmation')}}</th>
                            <th class="center">{{__('order.Details')}}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($exp_orders as $exp_order)
                        <tr>
                            <td>{{$exp_order->id}}</td>
                            <td>{{$exp_order->created_at}}</td>
                            <td>{{$exp_order->status}}</td>
                            @if($exp_order->user_status == '0')
                            @if(empty($exp_order->deleted_by))
                            <td><a href="{{route('express-orders.show',$exp_order->id)}}"
                                    class="btn btn-sm light-blue">{{__('cart.Confirm')}}</a> <span
                                    class="new badge"></span></td>
                            @else

                            <td><a href="#" class="btn disabled">Canceled</a></td>
                            @endif
                            @elseif($exp_order->user_status == '1')
                            <td>Confirmed</td>
                            @else
                            <td>Pending Price Confiramtion</td>
                            @endif
                            @if(empty($exp_order->deleted_by))
                            <td class="center"><a href="{{route('express-orders.show',$exp_order->id)}}"
                                    class="btn btn-sm light-blue">{{__('order.Details')}}</a></td>
                            @else

                            <td><a href="#" class="btn disabled">Canceled</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br>
</div>
@endsection
