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
            @foreach($products as $product)
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{asset('images/'.$product->image)}}">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{$product->name}}<i
                                class="material-icons right">more_vert</i></span>
                        <p><a href="{{route('sales.edit',$product->id)}}"
                                class="btn light-blue">{{__('product.Edit')}}</a>
                            <form action="{{route('sales.destroy',$product->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn light-blue" value="{{__('DEL')}}">
                            </form>
                        </p>

                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">{{$product->name}}<i
                                class="material-icons right">close</i></span>
                        <ul>
                            <li>{{__('product.Price')}} {{$product->price}}{{__('cart.Taka')}} {{__('cart.Kg')}}</li>
                            <li>{{__('product.Minimum Order')}} {{$product->stock_qty}}{{__('cart.Kg')}} </li>
                            <li>{{__('order.Address')}} {{$product->location}}</li>
                            <li>{{__('product.Seller')}} {{$product->seller_name}}</li>
                            <li>{{__('product.Phone')}} {{$product->phone}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
    <br><br>
</div>

<div id="add_product" class="side_add_product sidenav">
    <div class="row">
        <form class="col s12" action="{{route('sales.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input id="name" name="name" value="{{old('name')}}" type="text" class="validate">
                    <label for="name">{{__('product.Product Name en')}}</label>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-field col s6">
                    <input id="name_bn" name="name_bn" value="{{old('name_bn')}}" type="text" class="validate">
                    <label for="name_bn">{{__('product.Product Name bn')}}</label>
                    @error('name_bn')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="price" name="price" value="{{old('price')}}" type="text" class="validate">
                    <label for="price">{{__('product.Price')}}</label>
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-field col s6">
                    <input id="sale_price" value="{{old('sale_price')}}" type="text" name="sale_price" class="validate">
                    <label for="sale_price">{{__('product.Selling Price')}} </label>
                    @error('sale_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="stock_qty" name="stock_qty" value="{{old('stock_qty')}}" type="text" class="validate">
                    <label for="stock_qty">{{__('product.Stock')}}</label>
                    @error('stock_qty')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea id="short_description" value="{{old('short_description')}}" class="materialize-textarea"
                        name="short_description"></textarea>
                    <label for="short_description">{{__('product.short_description')}}</label>
                    @error('short_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-field col s12">
                    <textarea id="description" class="materialize-textarea" name="description"
                        value="{{old('description')}}"></textarea>
                    <label for="description">{{__('product.description')}} </label>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="short_description_bn" class="materialize-textarea" name="short_description_bn"
                        value="{{old('short_description_bn')}}"></textarea>
                    <label for="short_description_bn">{{__('product.short_description_bn')}} </label>
                    @error('short_description_bn')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-field col s12">
                    <textarea id="description_bn" value="{{old('description_bn')}}" class="materialize-textarea"
                        name="description_bn"></textarea>
                    <label for="description_bn">{{__('product.description_bn')}}</label>
                    @error('description_bn')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select name="measurment_unit_id">
                        <option value="" selected>Choose your option</option>
                        @foreach ($measurements as $item)
                        <option value="{{ $item->id }}" @if(old('measurment_unit_id')==$item->id ) selected @endif
                            >{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label>{{__('product.measurement_id')}}</label>
                    @error('measurment_unit_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-field col s6">
                    <select name="catagory_id">
                        <option value="" selected>Choose your option</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}" @if(old('catagory_id')==$item->id ) selected @endif
                            >{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label>{{__('product.category_id')}}</label>
                    @error('catagory_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="file-field col s12 input-field">
                    <div class="btn light-blue">
                        <span>{{__('product.Photo')}}</span>
                        <input value="{{old('image')}}" type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row text-center">
                <div class="file-field col s12 input-field">
                    <input value="Upload Plroduct" type="submit" class="btn btn-link" value="Save">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
