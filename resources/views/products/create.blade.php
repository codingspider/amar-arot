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
    <form class="col s12" action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
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
          <input id="rating" name="rating" type="text" class="validate">
          <label for="rating">Rating </label>
        </div>
        <div class="input-field col s6">
          <input id="rating_by" name="rating_by" type="text" class="validate">
          <label for="rating_by">Rating BY </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="product_code" type="text" name="product_code" class="validate">
          <label for="product_code">Product Code </label>
        </div>
        <div class="input-field col s6">
          <input id="sale_price" type="text" name="sale_price" class="validate">
          <label for="sale_price">Sale Price </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="variation_type" type="text" name="variation_type" class="validate">
          <label for="variation_type">Variation Type </label>
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
          <label for="short_description">Short Description </label>
        </div>
        <div class="input-field col s6">
          <textarea id="description" class="materialize-textarea" name="description"></textarea>
          <label for="description">Description </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <textarea id="short_description_bn" class="materialize-textarea" name="short_description_bn"></textarea>
          <label for="short_description_bn">Short Description Bangla </label>
        </div>
        <div class="input-field col s6">
          <textarea id="description_bn" class="materialize-textarea" name="description_bn"></textarea>
          <label for="description_bn">Description Bangla </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
          <select name="mesurment_id" name="measurment_unit_id">
            <option value="" selected>Choose your option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Mesurement Unit Id </label>
        </div>
        <div class="input-field col s4">
          <select name="cat_id" name="catagory_id">
            <option value="" selected>Choose your option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Category Id </label>
        </div>
        <div class="input-field col s4">
          <select name="seller_id" name="seller_id">
            <option value="" selected>Choose your option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Seller Id </label>
        </div>
      </div>
      <div class="row">
        <button type="submit" class="waves-effect waves-light btn"><i
            class="material-icons right">cloud</i>{{__('product.Save')}}</button>
      </div>

    </form>
  </div>
</div>
@endsection