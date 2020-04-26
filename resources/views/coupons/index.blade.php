@extends('layouts.app')


@section('contents')
<div class="container">
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{__('cart.coupons')}}</h2>
            </div>
            <div class="pull-right">
                @can('catagory-create')
                <a class="btn btn-success" href="{{ route('coupons.create') }}"> {{__('cart.coupons_creat')}}</a>
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
            <th>{{__('cart.code')}}</th>
            <th>{{__('cart.type')}}</th>
            <th>{{__('cart.value')}}</th>
            <th>{{__('cart.percent_off')}}</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($data as $coupon)
	    <tr>

	        <td>{{ $coupon->code }}</td>
	        <td>{{ $coupon->type }}</td>
	        <td>{{ $coupon->value }}</td>
	        <td>{{ $coupon->percent_off }}</td>
	        <td>
                <form action="{{ route('coupons.destroy',$coupon->id) }}" method="POST">
                    @can('coupon-edit')
                    <a class="btn btn-primary" href="{{ route('coupons.edit',$coupon->id) }}">Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('coupon-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

</div>

@endsection