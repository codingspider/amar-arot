@extends('layouts.app')
@section('contents')
<br>
<div class="container">
    <div class="row">
    <div class="col s12">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>

     <table>
        <thead>
          <tr>
             <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="300px">Action</th>
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
                <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
            </td>
            <td>
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
            <a class="btn waves-effect waves-light red lighten-2" href="{{ url('users/delete/'. $user->id) }}">Delete</a>

            </td>
        </tr>
        @endforeach
        </tbody>
      </table>
      {!! $data->render() !!}
</div>
@endsection