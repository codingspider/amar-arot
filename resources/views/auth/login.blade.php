@extends('layouts.auth')
@section('title','Login-AmarBazar')
@section('auth')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">আমার বাজার</h1>
        <div class="row center">
            <h5 class="header col s12 light">লগইন</h5>
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
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="text" class="validate">
                                        <label for="email">ই-মেইল বা ফোন নম্বর</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate">
                                        <label for="password">পাসওয়ার্ড</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-action center">
                        <a href="{{url('purchases')}}" class="btn light-blue">লগইন</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br><br>
</div>
@endsection
