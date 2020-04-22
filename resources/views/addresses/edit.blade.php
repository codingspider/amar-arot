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
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <form action="{{url('update-address')}}" method="POST">
                    <input type="hidden" name="type" value="{{$address->type}}">
                    <input type="hidden" name="id" value="{{$address->id}}">
                    <div class="card-action">
                        <p class="waves-effect waves-light btn">@if($address->type == '0')Billing Address @else Shipping
                            Address @endif</p>
                    </div>
                    <div class="card-content text-center">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="address_line_1" name="address_line_1" value="{{$address->address_line_1}}"
                                    type="text" class="validate">
                                <label for="address_line_1">Address line 1</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="address_line_2" name="address_line_2" value="{{$address->address_line_2}}"
                                    type="text" class="validate">
                                <label for="address_line_2">Address Line 2</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select name="district_id" id="district_id" class="validate">
                                    @foreach($districts as $district)
                                    <option value="{{$district->id}}" @if($address->district_id == $district->id)
                                        selected @endif>{{$district->name}}</option>
                                    @endforeach
                                </select>
                                <label for="district_id">District</label>
                            </div>
                        </div>

                    </div>
                    <div class="card-action">
                        <button class="waves-effect waves-light btn" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
