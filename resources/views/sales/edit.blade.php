@extends('layouts.app')
@section('contents')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">আমার বাজার</h1>
        <div class="row center">
            <h5 class="header col s12 light">আপনার পন্য সমূহ</h5>
            <a data-target="add_product" class="waves-effect waves-light btn right light-blue sidenav-trigger"><i
                    class="material-icons left">add_box</i>নতুন পণ্য যোগ করুন</a>
        </div>
    </div>
</div>


<div class="container">
    <div class="section">
        <div class="row">
            <form class="col s12" action="{{route('sales.update',$sale->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s6">
                        <input id="name" name="name" value="{{$sale->name}}" type="text" class="validate">
                        <label for="name">{{__('product.Product Name en')}}</label>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <input id="name_bn" name="name_bn" value="{{$sale->name_bn}}" type="text" class="validate">
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
                        <input id="price" name="price" value="{{$sale->price}}" type="text" class="validate">
                        <label for="price">{{__('product.Price')}}</label>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <input id="sale_price" value="{{$sale->sale_price}}" type="text" name="sale_price"
                            class="validate">
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
                        <input id="stock_qty" name="stock_qty" value="{{$sale->stock_qty}}" type="text"
                            class="validate">
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
                        <textarea id="short_description" class="materialize-textarea"
                            name="short_description">{{$sale->short_description}}</textarea>
                        <label for="short_description">{{__('product.short_description')}}</label>
                        @error('short_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <textarea id="description" class="materialize-textarea"
                            name="description">{{$sale->description}}</textarea>
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
                        <textarea id="short_description_bn" class="materialize-textarea"
                            name="short_description_bn">{{$sale->short_description_bn}}</textarea>
                        <label for="short_description_bn">{{__('product.short_description_bn')}} </label>
                        @error('short_description_bn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <textarea id="description_bn" value="" class="materialize-textarea"
                            name="description_bn">{{$sale->description_bn}}</textarea>
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
                            <option value="{{ $item->id }}" @if($sale->measurment_unit_id==$item->id ) selected @endif
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
                            <option value="{{ $item->id }}" @if($sale->catagory_id==$item->id ) selected @endif
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
    <br><br>
</div>

<div id="add_product" class="side_add_product sidenav">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="first_name" type="text" class="validate">
                    <label for="first_name">পণ্যের নাম</label>
                </div>
                <div class="input-field col s12">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">বিক্রয় মুল্য</label>
                </div>
                <div class="input-field col s12">
                    <input id="last_nam" type="text" class="validate">
                    <label for="last_nam">স্টক পরিমাণ</label>
                </div>
                <div class="input-field col s12">
                    <input id="last_na" type="text" class="validate">
                    <label for="last_na">পরিবহণ খরচ</label>
                </div>
                <div class="input-field col s12">
                    <input id="last_n" type="text" class="validate">
                    <label for="last_n">সর্বনিম্ন বিক্রয় পরিমাণ</label>
                </div>
                <div class="file-field col s12 input-field">
                    <div class="btn light-blue">
                        <span>ছবি</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="col s12 center">
                    <button class="btn light-blue" type="submit">সংরক্ষণ করুন</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
