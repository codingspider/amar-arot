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
                <h4>Edit Role</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <form class="col s12" action="{{ route('roles.update', $role->id)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Placeholder" name="name" type="text" value="{{ $role->name }}" class="validate">
                    <label for="role_name">Role Name</label>
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
            <button type="submit" class="btn btn-primary">Submit </button>
        </form>
    </div>
</div>
@endsection