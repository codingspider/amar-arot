@extends('layouts.app')
@section('pagetitle','Orders-AmarBazar')

@section('contents')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">{{__('welcome.Amar Bazar')}}</h1>
        <div class="row center">
            <h5 class="header col s12 light">{{__('order.Your orders')}}</h5>
        </div>
    </div>
</div>


<div class="container">
    <div class="section">
        <h5><a href="{{route('express-orders.create')}}" class="btn">{{__('order.New Order')}}</a></h5>

        <div class="row">
            <div class="col s12 z-depth-1">
                <table id="myTable" class="highlight">
                    <thead>
                        <tr>
                            <th>{{__('order.Order no')}}</th>
                            <th>{{__('order.Date')}}</th>
                            <th>{{__('order.Status')}}</th>
                            <th class="center">{{__('order.Details')}}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($exp_orders as $exp_order)
                        <tr>
                            <td>{{$exp_order->id}}</td>
                            <td>{{$exp_order->created_at}}</td>
                            <td>{{$exp_order->status}}@if($exp_order->status == "Pending")<span class="new badge"></span>@endif</td>
                            <td class="center"><a href="{{url('admin/express-orders/'.$exp_order->id)}}"
                                    class="btn btn-sm light-blue">{{__('order.Details')}}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <br><br>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
        $('select').formSelect();

    });
</script>
@endsection
