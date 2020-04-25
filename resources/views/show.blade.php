@extends('layouts.app')
@section('pagetitle','Purchase-AmarBazar')
@section('contents')
<div class="container">
    <div class="section">
        <div class="row">
            <div class="col s12 m12">
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{asset('images/'.$product_details->image)}}">
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="row">
                            <div class="col s12 m12">
                                <h2>{{$product_details->name}}</h2>
                            </div>
                            <div class="col s12 m12">
                                <h6><b>Category:</b> {{$categories->name}}</h6>
                            </div>
                            <div class="col s12 m12">
                                <h6><b>Price:</b>{{$product_details->price}}</h6>
                            </div>
                            <div class="col s12 m12">
                                <h6><b>Stock:</b>{{$product_details->stock_qty}}<b>{{$measurmentUnit->name}}</b></h6>
                            </div>
                            <div class="col s12 m12">
                                <h6><b>Product Code:</b>{{$product_details->product_code}}</h6>
                            </div>
                            <div class="col s12 m12">
                                <h6><b>Seller: </b>  {{$user->name}}</h6>
                            </div>
                            <div class="col s12 m12">
                                @if($user->phone)<h6><b>Seller: </b>  {{$user->phone}}@endif</h6>
                            </div>
                            <div class="col s12 m12">
                                <h6>@if(!empty($address))<b>Location: </b>{{$address->name}}@endif</h6>
                            </div>
                            <div class="col s12 m12">
                                <a href="#" class="btn light-blue">{{__('product.Add to Bag')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12">
                        @if($product_details->short_description)<h4>Short Description</h4>
                        <p class="flow-text">{{$product_details->short_description}}</p>@endif
                    </div>
                    <div class="col s12 m12">
                        @if($product_details->description)<h2>Description</h2>
                        <p class="flow-text">{{$product_details->description}}</p>@endif
                    </div>
                </div>

            </div>
        </div>

    </div>

    <br><br>
    <div class="section">
        <div class="row">
            <div class="col s12 m12">
                <h3 class="center-align">Realeted Product</h3>
            </div>
            @foreach($products as $product)
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
                    <div class="card-content">
                        <p><a href="{{route('details',$product->id)}}">{{__('Details')}}</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="{{url('cart')}}">
        <i class="large material-icons">add_shopping_cart</i>
    </a>
</div>
@endsection

@section('script')
<script>

</script>
@endsection
