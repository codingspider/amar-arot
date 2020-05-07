@extends('layouts.auth')

@section('auth')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">{{__('welcome.Amar Bazar')}}</h1>
        <div class="row center">
            <h5 class="header col s12 light">{{__('login.Registration')}}</h5>
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
                            <form class="col s12" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <a href="{{url('login')}}" class="btn btn-link right">{{__('login.Login')}}</a>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="first_name" type="text" class="validate" value="{{ old('name') }}" name="name">
                                        <label for="first_name">{{ __('login.Name') }}</label>
                                        @error('name')
                                        <span class="helper-text">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="name" type="text" class="validate" value="{{ old('name_bn') }}" name="name_bn">
                                        <label for="name">{{ __('login.Name_bn') }}</label>
                                        @error('name')
                                        <span class="helper-text">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="email" type="email" class="validate" value="{{ old('email') }}" name="email">
                                        <label for="email">{{ __('login.Email') }}</label>
                                        @error('email')
                                        <span class="helper-text">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate" value="{{ old('password') }}" name="password">
                                        <label for="password">{{ __('login.Password') }}</label>
                                        @error('password')
                                        <span class="helper-text">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="password-confirm" type="password" class="validate" value="{{ old('password-confirm') }}" name="password_confirmation">
                                        <label for="password-confirm">{{ __('login.ConfirmPassword') }}</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 center">
                                        <button type="submit" class="btn btn-link">
                                            {{ __('login.Registration') }}
                                        </button>
                                    </div>
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
