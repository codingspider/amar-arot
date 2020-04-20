@extends('layouts.app')


@section('contents')
<div class="container">
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{__('product.Catagory')}}</h2>
            </div>
            <div class="pull-right">
                @can('catagory-create')
                <a class="btn btn-success" href="{{ route('catagories.create') }}"> {{__('product.Catagory_create')}}</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($catagories as $catagory)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $catagory->name }}</td>
	        <td>{{ $catagory->detail }}</td>
	        <td>
                <form action="{{ route('catagories.destroy',$catagory->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('catagories.show',$catagory->id) }}">Show</a>
                    @can('catagory-edit')
                    <a class="btn btn-primary" href="{{ route('catagories.edit',$catagory->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('catagory-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $catagories->links() !!}
</div>

@endsection