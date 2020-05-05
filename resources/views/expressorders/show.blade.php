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
        <div class="row">
            <div class="col s12">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
            </div>
        </div>
        <div class="row z-depth-1">
            <div class="col s12 m6">
                <p>
                    {{__('order.Buyer Name')}} {{Auth::user()->name}} <br>
                    {{__('product.Phone')}} {{Auth::user()->phone}} <br>
                    {{__('order.Address')}} @if(!empty($address->address_line_1)){{$address->address_line_1}}@endif
                </p>
            </div>
            <div class="col s12 m4">
                <p>
                    {{__('order.Status')}}: {{$express_order->status}} <br>
                    {{__('order.Order no')}}: {{$express_order->id}} <br>
                    {{__('order.Date')}}:{{$express_order->created_at}}
                </p>
            </div>
            <div class="col s12 m2">
                <p>
                    <a href="{{route('express-orders.edit',$express_order->id)}}" class="btn"> Edit</a>
                    <form action="{{route('express-orders.destroy',$express_order->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-red"> Cancel</button>
                    </form>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col s12 z-depth-1">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>{{__('product.Product Name bn')}}</th>
                            <th>{{__('cart.brand')}}</th>
                            <th>{{__('cart.Quantity')}}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($express_order_details as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->brand}}</td>
                            <td>{{$item->qty}}</td>
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
