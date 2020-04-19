@extends('layouts.app')


@section('contents')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<div class="container">
<div class="row">
<form action="{{ route('users.store') }}" method="POST">
    @csrf
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" name="name" type="text" class="validate">
          <label for="first_name">Name</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Placeholder" name="name_bn" id="name_bn" type="text" class="validate">
          <label for="first_name">Bangla Name</label>
        </div>
        
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" name="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>

     
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          <label for="password">Password</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
           <input id="password-confirm" type="password" name="confirm-password" required autocomplete="new-password">
          <label for="password">Confirm Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
           <div class="input-field col s12">
                <select name="roles[]" multiple>
                @foreach ($roles as $item)
                    
                <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
                
                </select>
                <label> Select Role</label>
            </div>

        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
            
           <button class="waves-effect waves-light btn" type="submit"> Submit </button>
        </div>
      </div>

      

    </form>
  </div>
</div>


@endsection