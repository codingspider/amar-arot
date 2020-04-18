@extends('layouts.app')
@section('pagetitle','Cart-AmarBazar')

@section('contents')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">{{__('welcome.Amar Bazar')}}</h1>
        <div class="row center">
            <h5 class="header col s12 light">{{__('welcome.Everything together')}}</h5>
        </div>
    </div>
</div>


<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>{{__('cart.Product Name')}}</th>
                            <th>{{__('cart.Quantity')}}</th>
                            <th>{{__('cart.Unit price')}}</th>
                            <th>{{__('cart.Sub Total')}}</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>আম</td>
                            <td>২০{{__('cart.Kg')}}</td>
                            <td>১৫০{{__('cart.Taka')}}</td>
                            <td>৩০০০{{__('cart.Taka')}}</td>
                        </tr>
                        <tr>
                            <td>আম</td>
                            <td>২০{{__('cart.Kg')}}</td>
                            <td>১৫০{{__('cart.Taka')}}</td>
                            <td>৩০০০{{__('cart.Taka')}}</td>
                        </tr>
                        <tr>
                            <td>আম</td>
                            <td>২০{{__('cart.Kg')}}</td>
                            <td>১৫০{{__('cart.Taka')}}</td>
                            <td>৩০০০{{__('cart.Taka')}}</td>
                        </tr>
                    </tbody>
                </table>
                <p class="center">{{__('cart.Total')}} ৯০০০ {{__('cart.Taka')}}</p>
            </div>
            <div class="col s12">
                <button class="btn light-blue right waves-effect waves-light">{{__('cart.Confirm')}}</button>
            </div>
        </div>

    </div>
    <br><br>
</div>
@endsection
