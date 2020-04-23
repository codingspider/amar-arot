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
            <th>{{__('measurment.no')}}</th>
            <th>{{__('measurment.name')}}</th>
            <th>{{__('measurment.name_bn')}}</th>
            <th width="280px">{{__('measurment.action')}}</th>
        </tr>
	    @foreach ($measurments as $measurment)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $measurment->name }}</td>
	        <td>{{ $measurment->name_bn}}</td>
	        <td>
                <form action="{{ route('measurments.destroy',$measurment->id) }}" method="POST">
                   
                    @can('measurment-edit')
                    <a class="btn btn-primary" href="{{ route('measurments.edit',$measurment->id) }}">{{__('measurment.edit')}}</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('measurment-delete')
                    <button type="submit" class="btn btn-danger">{{__('measurment.delete')}}</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $measurments->links() !!}
</div>

@endsection