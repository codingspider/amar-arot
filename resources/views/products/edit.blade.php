@extends('layouts.app')

@section('contents')
<br>
<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>

<div class="container">
<div class="row">
<form class="col s12" action="{{ url('products/update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
      <div class="row">
        <div class="input-field col s6">
          <input value="{{ $product->name }}" id="first_name" name="name" type="text" class="validate">
          <label for="first_name">{{__('product.Product Name en')}}</label>
        </div>
        <div class="input-field col s6">
          <input value="{{ $product->name_bn }}" id="first_name" name="name_bn" type="text" class="validate">
          <label for="first_name">{{__('product.Product Name bn')}}</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input value="{{ $product->price }}" id="first_name" name="price" type="text" class="validate">
          <label for="first_name">{{__('product.Price')}} </label>
        </div>
        
        <div class="input-field col s6">
          <input value="{{ $product->sale_price }}" id="first_name" type="text" name="sale_price" class="validate">
          <label for="first_name">{{__('product.Selling Price')}} </label>
        </div>
        <div class="input-field col s6">
          <input value="{{ $product->stock_qty }}" id="first_name" name="stock_qty" type="text" class="validate">
          <label for="first_name">{{__('product.Stock')}}</label>
        </div>
        <div class="input-field col s6">
          <input value="{{ $product->product_code }} " id="first_name" type="text" name="product_code" class="validate">
          <label for="first_name">{{__('product.product_code')}}</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input value="{{ $product->variation_type }} " id="first_name" type="text" name="variation_type" class="validate">
          <label for="first_name">{{__('product.product_variation')}}</label>
        </div>
        <div class="input-field col s6">
           <span>{{__('product.Photo')}}</span>
          <input value="rating by " type="file" name="images" class="validate">

        </div>
      </div>
      <div class="row">
          <div class="input-field col s6">
              <textarea id="textarea1" class="materialize-textarea" name="short_description">{{ $product->short_description }}</textarea>
              <label for="first_name">{{__('product.short_description')}}</label>
            </div>
            <div class="input-field col s6">
                <textarea id="textarea1" class="materialize-textarea" name="description">{{ $product->description }}</textarea>
                <label for="first_name">{{__('product.description')}}    </label>
            </div>
      </div>
      <div class="row">
          <div class="input-field col s6">
              <textarea id="textarea1" class="materialize-textarea" name="short_description_bn">{{ $product->short_description_bn }}</textarea>
              <label for="first_name">{{__('product.short_description_bn')}}</label>
            </div>
            <div class="input-field col s6">
                <textarea id="textarea1" class="materialize-textarea" name="description_bn">{{ $product->description_bn }}</textarea>
                <label for="first_name">{{__('product.description_bn')}}</label>
            </div>
      </div>
      <div class="row">
          <div class="input-field col s4">
              <select name="mesurment_id" name="measurment_unit_id">
                    <option value="" selected>Choose your option</option>
                    @foreach ($measurement as $item)
                          
                      {{-- <option value="{{ $item->id }}">{{ $item->name }}</option> --}}
                       <option value="{{ $item->id}}" {{ $product->measurment_unit_id == $item->id ? 'selected' : '' }}>{{ $item->name}}</option>


                      @endforeach
              </select>
              <label>{{__('product.measurement_id')}}</label>
            </div>
            <div class="input-field col s4">
                <select name="cat_id" name="catagory_id">
                    <option value="" selected>Choose your option</option>
                    @foreach ($category as $item)
                          
                    <option value="{{ $item->id}}" {{ $product->catagory_id == $item->id ? 'selected' : '' }}>{{ $item->name}}</option>


                      @endforeach
                </select>
                <label>{{__('product.category_id')}}</label>
            </div>
            <div class="input-field col s4">
                <select name="seller_id" name="seller_id">
                  @php 
                  
                  $users = App\User::all();
                  
                  @endphp
                    <option value="" selected>Choose your option</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <label>{{__('product.seller_id')}}</label>
            </div>
      </div>
      <div class="row">
        <button type="submit" class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>Submit</button>
      </div>

    </form>
</div>
</div>
@endsection