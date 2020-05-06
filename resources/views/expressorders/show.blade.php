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
            <div class="col s12">
                @if($express_order->status == "Confired")
                    @if(empty(Auth::user()->phone))
                    <p class="btn red">Please Add Your Phone Number To Confirm The Order</p><br>
                    @endif

                    @if(count($billing)!=1)
                    <p class="btn red">Please Add Your billing To Confirm The Order</p><br>
                    @endif
                    @if(count($shipping)!=1)
                    <p class="btn red">Please Add Your Shipping To Confirm The Order</p>
                    @endif
                @endif
            </div>
        </div>
        <div class="row z-depth-1">
            <div class="col s12 m6">
                <p>
                    {{__('order.Buyer Name')}} {{Auth::user()->name}} <br>
                    {{__('product.Phone')}} {{Auth::user()->phone}} <br>
                    {{__('order.Address')}} @if(!empty($address->address_line_1)){{$address->address_line_1}}@endif @if(!empty($address->name)){{$address->name}}@endif
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
                    @if($express_order->status == "Confired")
                    <a href="{{route('orderconfiramtion',$express_order->id)}}"
                        class="btn @if($express_order->user_status =='1')disabled @endif">{{__('cart.Confirm')}}</a>

                    @elseif($express_order->status == "Processing")
                    <a href="{{route('orderconfiramtion',$express_order->id)}}" class="btn disabled">
                        {{__('order.Confired')}}</a>
                    @else
                    <a href="{{route('express-orders.edit',$express_order->id)}}" class="btn">{{__('order.Edit')}}</a>
                    @endif
                    <form action="{{route('express-orders.destroy',$express_order->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-red disabled">{{__('order.Cancel')}}</button>
                    </form>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col s12 z-depth-1">
                <table class="responsive-table">
                    <thead>
                        <tr>
                        <tr>
                            <th>{{__('product.Product Name bn')}}</th>
                            <th>{{__('cart.brand')}}</th>
                            <th>{{__('cart.Quantity')}}</th>
                            @if($express_order->status == 'Confired'|| $express_order->status == 'Processing')
                            <th>{{__('cart.Unit Price')}}</th>
                            <th>{{__('cart.Sub Total')}}</th>
                            @endif
                        </tr>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($express_order_details as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->brand}}</td>
                            <td>{{$item->qty}}</td>
                            @if($item->unit_price)
                            <td>{{$item->unit_price}}</td>
                            <td>{{$item->unit_price*$item->qty}}</td>
                            @php
                            $total_price += $item->unit_price*$item->qty;
                            @endphp
                            @endif
                        </tr>
                        @endforeach
                        @if($express_order->status == 'Confired')

                        <tr>
                            <td colspan="4">{{__('cart.Total')}}</td>
                            <td>{{$total_price}}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br>
</div>

@endsection
