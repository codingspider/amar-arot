@extends('layouts.app')


@section('contents')


<br>
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
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h4>{{__('role.new_role')}}</h4>
      </div>
      <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('roles.index') }}">{{__('role.back')}}</a>
      </div>
    </div>
  </div>
  <div class="row">
    <form class="col s12" action="{{ route('roles.store')}}" method="POST">
      @csrf
      <div class="row">
        <div class="input-field col s12">
          <input name="name" id="role_name" type="text" class="validate">
          <label for="role_name">{{__('role.name')}}</label>
        </div>

        @foreach($permission as $value)
        <div class="input-field col s12 m3">
          <label>
            <input class="filled-in" name="permission[]" value="{{$value->id}}" type="checkbox" />
            <span>{{ $value->name }}</span>
          </label>

        </div>
        @endforeach
        <br>

      </div>
      <br>
      <br>
      <button type="submit" class="btn btn-primary">{{__('role.save')}}</button>
    </form>
  </div>
</div>
@endsection