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
          <label for="first_name">Name</label>
        </div>
        <div class="input-field col s6">
          <input value="{{ $product->name_bn }}" id="first_name" name="name_bn" type="text" class="validate">
          <label for="first_name">Name Bangla </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input value="{{ $product->price }}" id="first_name" name="price" type="text" class="validate">
          <label for="first_name">Price </label>
        </div>
        <div class="input-field col s6">
          <input value="{{ $product->stock_qty }}" id="first_name" name="stock_qty" type="text" class="validate">
          <label for="first_name">Stock Quantity  </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input value="{{ $product->rating }} " id="first_name" name="rating" type="text" class="validate">
          <label for="first_name">Rating </label>
        </div>
        <div class="input-field col s6">
          <input value="{{ $product->rating_by }}" id="first_name" name="rating_by" type="text" class="validate">
          <label for="first_name">Rating BY </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input value="{{ $product->product_code }} " id="first_name" type="text" name="product_code" class="validate">
          <label for="first_name">Product Code  </label>
        </div>
        <div class="input-field col s6">
          <input value="{{ $product->sale_price }}" id="first_name" type="text" name="sale_price" class="validate">
          <label for="first_name">Sale Price </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input value="{{ $product->variation_type }} " id="first_name" type="text" name="variation_type" class="validate">
          <label for="first_name">Variation Type  </label>
        </div>
        <div class="input-field col s6">
          <input value="rating by " id="first_name" type="file" name="images" class="validate">

        </div>
      </div>
      <div class="row">
          <div class="input-field col s6">
              <textarea id="textarea1" class="materialize-textarea" name="short_description">{{ $product->short_description }}</textarea>
              <label for="first_name">Short Description   </label>
            </div>
            <div class="input-field col s6">
                <textarea id="textarea1" class="materialize-textarea" name="description">{{ $product->description }}</textarea>
                <label for="first_name">Description   </label>
            </div>
      </div>
      <div class="row">
          <div class="input-field col s6">
              <textarea id="textarea1" class="materialize-textarea" name="short_description_bn">{{ $product->short_description_bn }}</textarea>
              <label for="first_name">Short Description  Bangla </label>
            </div>
            <div class="input-field col s6">
                <textarea id="textarea1" class="materialize-textarea" name="description_bn">{{ $product->description_bn }}</textarea>
                <label for="first_name">Description  Bangla </label>
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
        <button type="submit" class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>Submit</button>
      </div>

    </form>
</div>
</div>
@endsection