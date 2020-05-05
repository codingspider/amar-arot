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


    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content text-center">
                    <table>
                        <thead>
                            <tr>
                                <th>{{__('profile.Name')}}</th>
                                <th>:</th>
                                <th>{{ $profile->name }}</th>
                            </tr>
                            <tr>
                                <th>{{__('profile.Bangla Name')}}</th>
                                <th>:</th>
                                <th>{{ $profile->name_bn }}</th>
                            </tr>
                            <tr>
                                <th>{{__('profile.Email')}}</th>
                                <th>:</th>
                                <th>{{ $profile->email }}</th>
                            </tr>
                            <tr>
                                <th>{{__('profile.website')}}</th>
                                <th>:</th>
                                <th>{{ $profile->website }}</th>
                            </tr>
                            <tr>
                                <th>{{__('profile.facebook')}}</th>
                                <th>:</th>
                                <th>{{ $profile->facebook }}</th>
                            </tr>
                            <tr>
                                <th>{{__('profile.phone')}}</th>
                                <th>:</th>
                                <th>{{ $profile->phone }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-action">
                    <a href="{{route('profiles.edit',$profile->id)}}" class="btn btn-link">{{__('profile.edit')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s6 m6">

            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-action">
                            <h6><span class="new badge red" data-badge-caption="Activated"></span> {{__('address.Billing Address')}}
                                <span><a href="{{url('add-address/billing')}}" class="btn btn-link">{{__('address.Add New')}}</a></span></h6>
                        </div>
                        @if(isset($billing))

                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <h6>Address Line 1:{{$billing->address_line_1}}</h6>
                                    <h6>@if(isset($billing->address_line_2))Address Line 2: {{$billing->address_line_2}}
                                        @endif
                                    </h6>
                                    <h6>District: {{$billing->name}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <a href="{{url('edit-address/'.$billing->id)}}" class="btn btn-link">{{__('address.Edit')}}</a>
                        </div>
                        @endif

                    </div>
                </div>
            </div>


            @foreach($billing_histories as $billing_history)
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-action">
                            <h6>{{__('address.Billing Address')}} <span><a href="{{url('active-address/'.$billing_history->id)}}"
                                        class="btn btn-link">Active</a> <a
                                        href="{{url('delete-address/'.$billing_history->id)}}"
                                        class="btn btn-danger">Delete</a>
                                </span></h6>

                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <h6>Address Line 1:{{$billing_history->address_line_1}}</h6>
                                    <h6>@if(isset($billing_history->address_line_2))Address Line 2:
                                        {{$billing_history->address_line_2}}
                                        @endif
                                    </h6>
                                    <h6>District: {{$billing_history->name}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <a href="{{url('edit-address/'.$billing_history->id)}}" class="btn btn-link">{{__('address.Edit')}}</a>
                        </div>
                    </div>
                </div>
            </div>


            @endforeach
        </div>
        <div class="col s6 m6">
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-action">
                            <h6><span class="new badge red" data-badge-caption="Activated"></span>{{__('address.Shipping Address')}}
                                <span><a href="{{url('add-address/shipping')}}" class="btn btn-link">{{__('address.Add New')}}</a></span>
                            </h6>
                        </div>
                        @if(isset($shipping))

                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <h6>Address Line 1:{{$shipping->address_line_1}}</h6>
                                    <h6>@if(isset($shipping->address_line_2))Address Line 2:
                                        {{$shipping->address_line_2}} @endif</h6>
                                    <h6>District:{{$shipping->name}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <a href="{{url('edit-address/'.$shipping->id)}}" class="btn btn-link">{{__('address.Edit')}}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @foreach($shipping_histories as $shipping_history)
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-action">
                            <h6>{{__('address.Shipping Address')}}<span><a href="{{url('active-address/'.$shipping_history->id)}}"
                                        class="btn btn-link">Active</a> <a
                                        href="{{url('delete-address/'.$shipping_history->id)}}"
                                        class="btn btn-danger">Delete</a>
                                </span></h6>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <h6>Address Line 1:{{$shipping_history->address_line_1}}</h6>
                                    <h6>@if(isset($shipping_history->address_line_2))Address Line 2:
                                        {{$shipping_history->address_line_2}} @endif</h6>
                                    <h6>District:{{$shipping_history->name}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <a href="{{url('edit-address/'.$shipping_history->id)}}" class="btn btn-link">{{__('address.Edit')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
