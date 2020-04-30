@extends('layouts.app')

@section('contents')
    <div class="container">
      <div class="row">
      <form class="col s12" action="{{ url('confirm/order')}}" method="POST">
        @csrf
      <div class="row">
        <div class="input-field col s6">
        <input id="last_name" type="text" name="name" value="{{ Auth::user()->name }}" class="validate">
          <label for="last_name">Name</label>
        </div>
        <div class="input-field col s6">
          <input id="name" type="text" name="name_bn" value="{{ Auth::user()->name_bn }}" class="validate">
          <label for="name_bn">Name Bangla</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="adress_1" type="text" name="address_1" value="{{ isset($address->address_line_1) }}" class="validate">
          <label for="adress_1">Address Line 1</label>
        </div>
        <div class="input-field col s6">
          <input id="adress_2" type="text" name="address_2" value="{{ isset($address->address_line_2) }}" class="validate">
          <label for="adress_2">Address Line 2</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
           <select class="input-field col s12" name="district">
              <option value=""> Select your district </option>
              @foreach ($district as $item)                      
                <option value="{{ $item->id}}">{{ $item->name_bn}}</option>
              @endforeach
              
            </select>
      
        </div>
      <div class="row">
        <div class="input-field col s12">
      <label>
        <input type="checkbox" name="shipping" class="filled-in" value="1" checked="checked" />
        <span>Shipping addres</span>
      </label>
      
        </div>
       
      </div>

      <div class="row">
        <div class="input-field col s12">
           <button class="btn btn-info" type="submit">Confirm your order </button>
      
        </div>
       
      </div>

    </form>
  </div>
    </div>
@endsection