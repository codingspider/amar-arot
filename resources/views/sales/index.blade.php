@extends('layouts.app')
@section('contents')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">{{__('welcome.Amar Bazar')}}</h1>
        <div class="row center">
            <h5 class="header col s12 light">{{__('product.Your Products')}}</h5>
            <a data-target="add_product" class="waves-effect waves-light btn right light-blue sidenav-trigger"><i
                    class="material-icons left">add_box</i>{{__('product.Add New Products')}}</a>
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
                        <p><a href="edit.html" class="btn light-blue">{{__('product.Edit')}}</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">আনার<i
                                class="material-icons right">close</i></span>
                        <ul>
                            <li>{{__('product.Price')}} ২৫০{{__('cart.Taka')}} {{__('cart.Kg')}}</li>
                            <li>{{__('product.Minimum Order')}} ৫{{__('cart.Kg')}} </li>
                            <li>{{__('order.Address')}} ঢাকা</li>
                            <li>{{__('product.Seller')}} কামাল মিয়া</li>
                            <li>{{__('product.Phone')}} ০১৭০০০০০০০০</li>
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
                        <p><a href="edit.html" class="btn light-blue">{{__('product.Edit')}}</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">আম<i
                                class="material-icons right">close</i></span>
                        <ul>
                            <li>{{__('product.Price')}} ২৫০{{__('cart.Taka')}} {{__('cart.Kg')}}</li>
                            <li>{{__('product.Minimum Order')}} ৫ {{__('cart.Kg')}} </li>
                            <li>{{__('order.Address')}} ঢাকা</li>
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
                        <p><a href="edit.html" class="btn light-blue">{{__('product.Edit')}}</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">ফজলি আম<i
                                class="material-icons right">close</i></span>
                        <ul>
                            <li>{{__('product.Price')}} ২৫০{{__('cart.Taka')}} {{__('cart.Kg')}}</li>
                            <li>{{__('product.Minimum Order')}} ৫{{__('cart.Kg')}} </li>
                            <li>{{__('order.Address')}} ঢাকা</li>
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
                        <p><a href="edit.html" class="btn light-blue">{{__('product.Edit')}}</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">কমলা<i
                                class="material-icons right">close</i></span>
                        <ul>
                            <li>{{__('product.Price')}} ২৫০{{__('cart.Taka')}} {{__('cart.Kg')}}</li>
                            <li>{{__('product.Minimum Order')}} ৫{{__('cart.Kg')}} </li>
                            <li>{{__('order.Address')}} ঢাকা</li>
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
