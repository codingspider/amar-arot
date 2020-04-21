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
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <form action="{{ url('users/update' ) }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Placeholder" id="first_name" name="name" value="{{ $user->name }}" type="text"
                        class="validate">
                    <label for="first_name">Name</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Placeholder" name="name_bn" value="{{ $user->name_bn }}" id="name_bn"
                        type="text" class="validate">
                    <label for="first_name">Bangla Name</label>
                </div>

            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" name="email" value="{{ $user->email }}" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12">

                    <button class="waves-effect waves-light btn" type="submit"> Submit </button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
