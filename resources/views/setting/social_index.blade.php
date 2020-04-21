@extends('layouts.app')

@section('contents')
    <div class="container">
        <div class="row">
        <div class="col s12">
            <div class="pull-left">
                <h2>Role Management</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                <a class="btn btn-success" href="{{ route('socials.create') }}"> Create Social links</a>
                @endcan
            </div>
        </div>
    </div>
<table>
        <thead>
          <tr>
              <th>Title </th>
              <th>Title Bangla</th>
              <th>Links</th>
              <th>Updated By </th>
              <th>Action </th>
          </tr>
        </thead>

        <tbody>
            @foreach ($data as $item)
                 <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->title_bn }}</td>
                    <td>{{ $item->links }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <form action="{{ route('socials.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @can('social-edit')
                    <a class="btn btn-primary" href="{{ route('socials.edit',$item->id) }}">Edit</a>
                    @endcan
                    @can('social-delete')
                    <button class="btn waves-effect waves-light red lighten-2" type="submit" >Delete</button>
                    @endcan
                </form>
                    </td>
                  
                    
                </tr>
                @endforeach
         
        </tbody>
      </table>
    </div>
@endsection