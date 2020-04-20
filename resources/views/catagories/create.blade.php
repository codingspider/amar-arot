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
    <form class="col s12" action="{{ route('catagories.store')}}" method="POST">
      @csrf
      <div class="row">
        <div class="input-field col s6">
          <input id="name" name="name" type="text" class="validate">
          <label for="name">{{__('product.catagory_name_en')}}</label>
        </div>
        <div class="input-field col s6">
          <input id="name_bn" name="name_bn" type="text" class="validate">
          <label for="name_bn">{{__('product.catagory_name_bn')}}</label>
        </div>
      </div>
        <div class="input-field col s4">
          <select name="seller_id" name="seller_id">
            <option value="" selected>---</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>{{__('product.catagory_name_main')}}</label>
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