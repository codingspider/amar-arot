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
                </div>
                <form action="{{ route('profiles.update',$profile->id ) }}" method="POST">
                    <div class="card-content text-center">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="first_name" name="name" value="{{ $profile->name }}" type="text"
                                    class="validate">
                                <label for="first_name">{{__('profile.Name')}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="bn_name" name="name_bn" value="{{ $profile->name_bn }}" type="text"
                                    class="validate">
                                <label for="bn_name">{{__('profile.Bangla Name')}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="website" name="website" value="{{ $profile->website }}" type="text"
                                    class="validate">
                                <label for="website">{{__('profile.website')}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="facebook" name="facebook" value="{{ $profile->facebook }}" type="text"
                                    class="validate">
                                <label for="facebook">{{__('profile.facebook')}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="phone" name="phone" value="{{ $profile->phone }}" type="text"
                                    class="validate">
                                <label for="phone">{{__('profile.phone')}}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" name="email" value="{{ $profile->email }}"
                                    class="validate" disabled>
                                <label for="email">{{__('profile.Email')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="waves-effect waves-light btn" type="submit">{{__('profile.Update')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
