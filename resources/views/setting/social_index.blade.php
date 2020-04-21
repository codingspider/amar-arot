@extends('layouts.app')

@section('contents')
    <div class="container">
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
                    <td>{{ $item->updated_by }}</td>
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