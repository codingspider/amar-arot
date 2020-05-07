@extends('layouts.app')

@section('contents')

<br>
<br>
<br>
<div class="container">
<div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
        <img src="{{ asset('images/'.$product->image )}}">
        
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
            <span class="card-title">{{ $product->name }}</span>
        <p>{{ $product->description }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection