@extends('layouts.auth')
@section('title','Login-AmarArot')
@section('auth')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">{{__('welcome.Amar Bazar')}}</h1>
        <div class="row center">
            <h5 class="header col s12 light">{{__('login.Login')}}</h5>
        </div>
    </div>
</div>


<div class="container">
    <div class="section">

        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content black-text">
                        <div class="row">



                            <form class="col s12" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <a class="btn right" href="{{ route('register') }}">
                                    {{__('login.Registration')}}
                                </a>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="first_name" type="email" class="validate" name="email"
                                            value="{{ old('email') }}">
                                        <label for="first_name">{{__('login.Email')}}</label>
                                        <span class="helper-text" data-error="Please Enter Valid Email Address"
                                            data-success="">
                                            {{ $errors->has('email') ? $errors->first('email') : '' }}
                                        </span>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="password" type="password" name="password" class="validate">
                                        <label for="password">{{__('login.Password')}}</label>
                                        @if($errors->has('password'))
                                        <span class="helper-text">
                                            {{ $errors->first('password') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="input-field col s12">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span>{{__('login.remember')}}</span>
                                        </label>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col s12 center">
                                        <br>
                                        <button type="submit" class="btn btn-small">
                                            {{__('login.Login')}}
                                        </button>

                                        <a class="btn btn-flat btn-small" href="{{ route('password.request') }}">
                                            {{__('login.forgot')}}
                                        </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br><br>
</div>
@endsection