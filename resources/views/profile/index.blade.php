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
    <!-- <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-image">
                    {{--@if($profile->image)
                    <img src="{{$profile->image}}">
                    @else
                    <img src="https://materializecss.com/images/sample-1.jpg" alt="">
                    @endif

                    <span class="card-title">{{ $profile->name }}</span>--}}
                </div>
                <div class="card-content text-center">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>:</th>
                                <th>{{ $profile->name }}</th>
                            </tr>
                            <tr>
                                <th>Bangla Name</th>
                                <th>:</th>
                                <th>{{ $profile->name_bn }}</th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>:</th>
                                <th>{{ $profile->email }}</th>
                            </tr>
                            <tr>
                                <th>website</th>
                                <th>:</th>
                                <th>{{ $profile->website }}</th>
                            </tr>
                            <tr>
                                <th>facebook</th>
                                <th>:</th>
                                <th>{{ $profile->facebook }}</th>
                            </tr>
                            <tr>
                                <th>phone</th>
                                <th>:</th>
                                <th>{{ $profile->phone }}</th>
                            </tr>
                            @foreach($addresses as $address)
                            <tr>
                                <th colspan="3">@if($address->type == "0")Billing @endif   @if($address->type == "1")Shipping @endif</th>
                            </tr>
                            <tr>
                                <th>Address Line 1</th>
                                <th>:</th>
                                <th>{{$address->address_line_1}}</th>
                            </tr>
                            <tr>
                                <th>Address Line 2</th>
                                <th>:</th>
                                <th>{{$address->address_line_2}}</th>
                            </tr>
                            <tr>
                                <th>District</th>
                                <th>:</th>
                                <th>{{$address->name}}</th>
                            </tr>
                            @endforeach

                        </thead>
                    </table>
                </div>
                <div class="card-action">
                    <a href="{{route('profiles.edit',$profile->id)}}" class="btn btn-link">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
