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
@if(session()->has('warning'))
    <div class="alert alert-danger">
        {{ session()->get('warning') }}
    </div>
@endif

<div class="container">
  <div class="row">
    <form class="col s12" action="{{ route('coupons.store')}}" method="POST">
      @csrf
      <div class="row">
        <div class="input-field col s6">
          <input id="code" name="code" type="text" class="validate">
          <label for="code">{{__('cart.code')}}</label>
        </div>
        <div class="input-field col s6">
          <input id="type" name="type" type="text" class="validate">
          <label for="type">{{__('cart.type')}}</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="value" name="value" type="text" class="validate">
          <label for="value">{{__('cart.value')}}</label>
        </div>
        <div class="input-field col s6">
          <input id="percent_off" name="percent_off" percent_off="text" class="validate">
          <label for="percent_off">{{__('cart.percent_off')}}</label>
        </div>
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