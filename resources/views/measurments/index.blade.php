@extends('layouts.app')


@section('contents')
<div class="container">
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{__('product.measurment')}}</h2>
            </div>
            <div class="pull-right">
                @can('measurment-create')
                <a class="btn btn-success" href="{{ route('measurments.create') }}"> {{__('product.measurment_create')}}</a>
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
	    @foreach ($measurments as $measurment)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $measurment->name }}</td>
	        <td>{{ $measurment->detail }}</td>
	        <td>
                <form action="{{ route('measurments.destroy',$measurment->id) }}" method="POST">
                   
                    @can('measurment-edit')
                    <a class="btn btn-primary" href="{{ route('measurments.edit',$measurment->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('measurment-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $measurments->links() !!}
</div>

@endsection