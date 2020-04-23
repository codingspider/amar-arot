@extends('layouts.app')


@section('contents')

<div class="container">
    <div class="row">
        <div class="col-md-12">
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
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}">{{__('role.back')}}</a>
            </div>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('users.update',$user->id ) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Placeholder" id="first_name" name="name" value="{{ $user->name }}" type="text"
                        class="validate">
                    <label for="first_name">{{ __('login.Name') }}</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Placeholder" name="name_bn" value="{{ $user->name_bn }}" id="name_bn"
                        type="text" class="validate">
                    <label for="first_name">{{ __('login.Name_bn') }}</label>
                </div>

            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" name="email" value="{{ $user->email }}" class="validate" disabled>
                    <label for="email">{{ __('login.Email') }}</label>
                </div>
            </div>
            @php
                $roles = json_decode($user->roles);
                $all_roll = array();
                foreach($roles as $role){
                    $all_roll[] = $role->name;
                }
            @endphp
            <div class="row">
                <div class="input-field col s12">
                    <div class="input-field col s12">
                        <select name="roles[]" multiple>
                            @foreach ($roles as $item)

                            <option value="{{ $item->name }}" {{ in_array($item->name, $all_roll) ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach

                        </select>
                        <label>{{__('user.role')}}</label>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">

                    <button class="waves-effect waves-light btn" type="submit"> {{ __('role.save') }} </button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
