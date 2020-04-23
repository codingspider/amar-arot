@extends('layouts.app')

@section('contents')
    <div class="container">
        <div class="row">
        <div class="col s12">
            <div class="pull-left">
                <h2>{{__('setting.header_create')}}</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                <br>
                <a class="btn btn-success" href="{{ route('headers.create') }}">{{__('setting.header_new')}}</a>
                @endcan
            </div>
        </div>
    </div>
<table>
        <thead>
          <tr>
              <th>{{__('setting.title')}} </th>
              <th>{{__('setting.title_bn')}}</th>
              <th class="center">{{__('setting.link')}}</th>
              <th>{{__('setting.updated_by')}}</th>
              <th>{{__('setting.action')}} </th>
          </tr>
        </thead>

        <tbody>
            @foreach ($data as $item)
                 <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->title_bn }}</td>
                    <td class="center"><a href="{{ $item->links }}" class="center"><i class="material-icons">location_on</i></a></td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <form action="{{ route('socials.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @can('social-edit')
                    <a class="btn btn-primary" href="{{ route('headers.edit',$item->id) }}">{{__('setting.edit')}}</a>
                    @endcan
                    @can('social-delete')
                    <button class="btn waves-effect waves-light red" type="submit" >{{__('setting.delete')}}</button>
                    @endcan
                </form>
                    </td>
                  
                    
                </tr>
                @endforeach
         
        </tbody>
      </table>
    </div>
@endsection