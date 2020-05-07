@extends('layouts.auth')
@section('title','Welcome-AmarBazar')
@section('auth')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">{{__('welcome.Amar Bazar')}}</h1>
        <div class="row center">
            <h5 class="header col s12 light">{{__('welcome.Everything together')}}</h5>
        </div>
        <div class="row center">
            <a href="{{url('login')}}" id="download-button" class="btn-large waves-effect waves-light light-blue">{{__('login.Login')}}</a>
        </div>
        <br><br>

    </div>
</div>
<div class="container">
    <div class="section">
        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
                    <h5 class="center">{{__('welcome.Fast delivery')}}</h5>

                    <p class="light center">{{__('welcome.First of all')}}</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                    <h5 class="center">{{__('welcome.Fast delivery')}}</h5>

                    <p class="light center">{{__('welcome.Do everything easily')}}</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
                    <h5 class="center">{{__('welcome.Easy interface')}}</h5>

                    <p class="light center">{{__('welcome.Your information is under your control')}}</p>
                </div>
            </div>
        </div>

    </div>
    <br><br>
</div>
@endsection
