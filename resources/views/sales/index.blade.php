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
        <form class="col s12" action="" method="POST">
            <div class="row">
                <div class="input-field col s6">
                    <input id="name" name="name" type="text" class="validate">
                    <label for="name">{{__('product.Product Name en')}}</label>
                </div>
                <div class="input-field col s6">
                    <input id="name_bn" name="name_bn" type="text" class="validate">
                    <label for="name_bn">{{__('product.Product Name bn')}}</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="price" name="price" type="text" class="validate">
                    <label for="price">{{__('product.Selling Price')}}</label>
                </div>
                <div class="input-field col s6">
                    <input id="stock_qty" name="stock_qty" type="text" class="validate">
                    <label for="stock_qty">{{__('product.Stock')}}</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="product_code" type="text" name="product_code" class="validate">
                    <label for="product_code">{{__('product.product_code')}}</label>
                </div>
                <div class="input-field col s6">
                    <input id="sale_price" type="text" name="sale_price" class="validate">
                    <label for="sale_price">{{__('product.sale_price')}} </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="variation_type" type="text" name="variation_type" class="validate">
                    <label for="variation_type">{{__('product.product_variation')}} </label>
                </div>
                <div class="file-field col s6 input-field">
                    <div class="btn light-blue">
                        <span>{{__('product.Photo')}}</span>
                        <input type="file" name="images">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <textarea id="short_description" class="materialize-textarea" name="short_description"></textarea>
                    <label for="short_description">{{__('product.short_description')}}</label>
                </div>
                <div class="input-field col s6">
                    <textarea id="description" class="materialize-textarea" name="description"></textarea>
                    <label for="description">{{__('product.description')}} </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <textarea id="short_description_bn" class="materialize-textarea"
                        name="short_description_bn"></textarea>
                    <label for="short_description_bn">{{__('product.short_description_bn')}} </label>
                </div>
                <div class="input-field col s6">
                    <textarea id="description_bn" class="materialize-textarea" name="description_bn"></textarea>
                    <label for="description_bn">{{__('product.description_bn')}}</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <select name="mesurment_id" name="measurment_unit_id">
                        <option value="" selected>Choose your option</option>
                        @foreach ($measurements as $item)

                        <option value="{{ $item->id }}">{{ $item->name }}</option>

                        @endforeach

                    </select>
                    <label>{{__('product.measurement_id')}}</label>
                </div>
                <div class="input-field col s4">
                    <select name="cat_id" name="catagory_id">
                        <option value="" selected>Choose your option</option>
                        @foreach ($categories as $item)

                        <option value="{{ $item->id }}">{{ $item->name }}</option>

                        @endforeach
                    </select>
                    <label>{{__('product.category_id')}}</label>
                </div>
                <div class="input-field col s4">
                    <select name="seller_id" name="seller_id">
                        <option value="" selected>Choose your option</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label>{{__('product.seller_id')}}</label>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
