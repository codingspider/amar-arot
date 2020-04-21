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
                        </thead>
                    </table>
                </div>
                <div class="card-action">
                    <a href="{{route('profiles.edit',$profile->id)}}" class="btn btn-link">Edit</a>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col s6 m6">
            <div class="card">
                <div class="card-action">
                    <h4>Billing Address</h4>
                </div>
                <div class="card-content">
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
                        </thead>
                    </table>
                </div>
                <div class="card-action">
                    <a href="{{route('profiles.edit',$profile->id)}}" class="btn btn-link">Edit</a>
                </div>
            </div>
        </div>
        <div class="col s6 m6">
            <div class="card">
                <div class="card-action">
                    <h4>Shipping Address</h4>
                </div>
                <div class="card-content">
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
