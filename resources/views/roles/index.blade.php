@extends('layouts.app')


@section('contents')
<br>

<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="pull-left">
                <h2>{{__('role.roles')}}</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}">{{__('role.new_role')}}</a>
                @endcan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>{{__('role.no')}}</th>
            <th>{{__('role.name')}}</th>
            <th width="280px">{{__('role.action')}}</th>
        </tr>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">{{__('role.show')}}</a>
                    @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">{{__('role.edit')}}</a>
                    @endcan
                    @can('role-delete')
                    <button class="btn waves-effect waves-light red lighten-2" type="submit" >{{__('role.delete')}}</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $roles->render() !!}
</div>
@endsection
