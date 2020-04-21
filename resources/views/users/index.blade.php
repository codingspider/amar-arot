@extends('layouts.app')
@section('contents')
<br>
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="pull-left">
                <h2>{{__('user.users')}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}">{{__('user.new_user')}}</a>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>{{__('user.no')}}</th>
                <th>{{__('user.name')}}</th>
                <th>{{__('user.email')}}</th>
                <th>{{__('user.role')}}</th>
                <th width="300px">{{__('user.action')}}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success black-text">{{ $v }}</label>,
                    @endforeach
                    @endif
                </td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{ route('users.show',$user->id) }}">{{__('user.show_user')}}</a>
                        @can('user-edit')
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">{{__('user.edit_user')}}</a>
                        @endcan
                        @can('user-delete')
                        <a class="btn waves-effect waves-light red lighten-2" type="submit">{{__('user.delete_user')}}</a>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data->render() !!}
</div>
@endsection
