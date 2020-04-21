@extends('layouts.app')


@section('contents')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{__('role.role')}} : {{ $role->name }}</h2>
        </div>
        <div class="pull-right">
            <br>
            <a class="btn btn-primary" href="{{ route('roles.index') }}">{{__('role.back')}}</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col s12">
        <p class="flow-text">
            <strong>{{__('role.permission')}}:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    {{ $v->name }}, 
                @endforeach
            @endif
        </p>
    </div>
</div>
</div>
@endsection