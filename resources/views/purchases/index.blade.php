@extends('layouts.app')
@section('pagetitle','Purchase-AmarArot')
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

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{asset('content')}}/img/product/anar.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">আনার<i
                                class="material-icons right">more_vert</i></span>
                        <p><a href="#" class="btn light-blue">{{__('product.Add to Bag')}}</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">আনার<i
                                class="material-icons right">close</i></span>
                        <ul>
                            <li>{{__('product.Price')}} ২৫০টাকা কেজি</li>
                            <li>{{__('product.Minimum Order')}} ৫কেজি</li>
                            <li>{{__('product.Place')}} ঢাকা</li>
                            <li>{{__('product.Seller')}} কামাল মিয়া</li>
                            <li> {{__('product.Phone')}} ০১৭০০০০০০০০</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{asset('content')}}/img/product/mango.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">আম<i
                                class="material-icons right">more_vert</i></span>
                        <p><a href="#" class="btn light-blue">{{__('product.Add to Bag')}}</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">আম<i
                                class="material-icons right">close</i></span>
                        <ul>
                            <li>{{__('product.Price')}} ২৫০টাকা কেজি</li>
                            <li>{{__('product.Minimum Order')}} ৫কেজি </li>
                            <li>{{__('product.Place')}} ঢাকা</li>
                            <li>{{__('product.Seller')}} কামাল মিয়া</li>
                            <li>{{__('product.Phone')}} ০১৭০০০০০০০০</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{asset('content')}}/img/product/mango2.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">ফজলি আম<i
                                class="material-icons right">more_vert</i></span>
                        <p><a href="#" class="btn light-blue">{{__('product.Add to Bag')}}</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">ফজলি আম<i
                                class="material-icons right">close</i></span>
                        <ul>
                            <li>{{__('product.Price')}} ২৫০টাকা কেজি</li>
                            <li>{{__('product.Minimum Order')}} ৫কেজি </li>
                            <li>{{__('product.Place')}} ঢাকা</li>
                            <li>{{__('product.Seller')}} কামাল মিয়া</li>
                            <li>{{__('product.Phone')}} ০১৭০০০০০০০০</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{asset('content')}}/img/product/orange.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">কমলা<i
                                class="material-icons right">more_vert</i></span>
                        <p><a href="#" class="btn light-blue">{{__('product.Add to Bag')}}</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">কমলা<i
                                class="material-icons right">close</i></span>
                        <ul>
                            <li>{{__('product.Price')}} ২৫০টাকা কেজি</li>
                            <li>{{__('product.Minimum Order')}} ৫কেজি </li>
                            <li>{{__('product.Place')}} ঢাকা</li>
                            <li>{{__('product.Seller')}} কামাল মিয়া</li>
                            <li>{{__('product.Phone')}} ০১৭০০০০০০০০</li>
                        </ul>
                    </div>
                </div>
            </div>
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
