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
                <div class="card-image">

                    <!-- <span class="card-title">{{ $profile->name }}</span> -->
                </div>
                <form action="{{ route('profiles.update',$profile->id ) }}" method="POST">
                    <div class="card-content text-center">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="first_name" name="name" value="{{ $profile->name }}" type="text"
                                    class="validate">
                                <label for="first_name">Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="bn_name" name="name_bn" value="{{ $profile->name_bn }}" type="text"
                                    class="validate">
                                <label for="bn_name">Bangla Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="website" name="website" value="{{ $profile->website }}" type="text"
                                    class="validate">
                                <label for="website">Website</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="facebook" name="facebook" value="{{ $profile->facebook }}" type="text"
                                    class="validate">
                                <label for="facebook">facebook</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="phone" name="phone" value="{{ $profile->phone }}" type="text"
                                    class="validate">
                                <label for="phone">phone</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" name="email" value="{{ $profile->email }}"
                                    class="validate" disabled>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        @if(!empty($addresses))
                        @foreach($addresses as $address)
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="address_line_1{{$address->id}}" type="text" name="address_line_1[]"
                                    value="{{$address->address_line_1}}" class="validate">
                                <label for="address_line_1">Address Line 1</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="address_line_2{{$address->id}}" type="text" name="address_line_2[]"
                                    value="{{$address->address_line_2}}" class="validate">
                                <label for="address_line_2">Address Line 2</label>
                            </div>
                            <div class="input-field col s2">
                                <select name="district_id[]" class="validate">
                                    @foreach($districts as $district)
                                    <option value="{{$district->id}}" @if($address->district_id == $district->id)
                                        selected @endif>{{$district->name}}</option>
                                    @endforeach
                                </select>
                                <label for="district_1">District</label>
                            </div>
                            <div class="input-field col s2">
                                <select name="type[]" class="validate">
                                    <option value="0" @if($address->type == "0") selected @endif>Billing</option>
                                    <option value="1" @if($address->type == "1") selected @endif>Shipping</option>
                                </select>
                                <label for="type_1">Type</label>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="address_line_1" type="text" name="address_line_1[]" value=""
                                    class="validate">
                                <label for="address_line_1">Address Line 1</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="address_line_2" type="text" name="address_line_2[]" value=""
                                    class="validate">
                                <label for="address_line_2">Address Line 2</label>
                            </div>
                            <div class="input-field col s2">
                                <select name="district_id[]" class="validate">
                                    @foreach($districts as $district)
                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
                                </select>
                                <label for="district_1">District</label>
                            </div>
                            <div class="input-field col s2">
                                <select name="type[]" class="validate">
                                    <option value="0">Billing</option>
                                    <option value="1">Shipping</option>
                                </select>
                                <label for="type_1">Type</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="address_line_1_shipping" type="text" name="address_line_1[]" value=""
                                    class="validate">
                                <label for="address_line_1_shipping">Address Line 1</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="address_line_2_shipping" type="text" name="address_line_2[]" value=""
                                    class="validate">
                                <label for="address_line_2_shipping">Address Line 2</label>
                            </div>
                            <div class="input-field col s2">
                                <select name="district_id[]" class="validate">
                                    @foreach($districts as $district)
                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
                                </select>
                                <label for="district_1">District</label>
                            </div>
                            <div class="input-field col s2">
                                <select name="type[]" class="validate">
                                    <option value="0">Billing</option>
                                    <option value="1" selected>Shipping</option>
                                </select>
                                <label for="type_1">Type</label>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="card-action">
                        <button class="waves-effect waves-light btn" type="submit">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
