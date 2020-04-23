@extends('layouts.app')
@section('pagetitle','Purchase-AmarBazar')
@section('contents')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">{{__('welcome.Amar Bazar')}}</h1>
        <div class="row center">
            <h5 class="header col s12 light">{{__('welcome.Everything together')}}</h5>
            <div class="input-field inline">
                <input id="email_inline" type="email" class="validate">
                <label for="email_inline">{{__('product.Search Box')}}</label>
            </div>
            <div class="input-field inline">
                <button class="btn btn-sm light-blue" type="submit">{{__('product.Search')}}</button>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="section">

        <div class="row">
            @foreach($categories as $category)
            <div class="col s12 m12">
                <h2 class="center-align">{{ $category->name}}</h2>
            </div>
            @foreach($products as $product)
            @if($product->catagory_id == $category->id)
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{asset('uploads/'.$product->image)}}">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{$product->name}}<i
                                class="material-icons right">more_vert</i></span>
                        <p><a href="#" class="btn light-blue">{{__('product.Add to Bag')}}</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">{{$product->name}}<i
                                class="material-icons right">close</i></span>
                        <ul>
                            <li>{{__('product.Price')}} {{$product->price}}{{__('cart.Taka')}} {{__('cart.Kg')}}</li>
                            <li>{{__('product.Minimum Order')}} {{$product->stock_qty}}{{__('cart.Kg')}} </li>
                            <li>{{__('product.Place')}} {{$product->location}}</li>
                            <li>{{__('product.Seller')}} {{$product->seller_name}}</li>
                            <li>{{__('product.Phone')}} {{$product->phone}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
        </div>

    </div>
    <br><br>
</div>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="{{url('cart')}}">
        <i class="large material-icons">add_shopping_cart</i>
    </a>
</div>
@endsection
