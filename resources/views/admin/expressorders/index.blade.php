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
        <h5><a href="{{route('admin.express-orders.create')}}" class="btn">{{__('order.New Order')}}</a></h5>

        <div class="row">
            <div class="col s12 z-depth-1">
                <table id="myTable" class="highlight">
                    <thead>
                        <tr>
                            <th>{{__('order.Order no')}}</th>
                            <th>{{__('order.Date')}}</th>
                            <th>{{__('order.Status')}}</th>
                            <th>{{__('order.User Confirmation')}}</th>
                            <th class="center">{{__('order.Details')}}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($exp_orders as $exp_order)
                        <tr>
                            <td>{{$exp_order->id}}</td>
                            <td>{{$exp_order->created_at}}</td>
                            <td>{{$exp_order->status}}@if($exp_order->read_status == '1')<span
                                    class="new badge"></span>@endif</td>
                            @if(empty($exp_order->deleted_by))
                            <td>
                                @if($exp_order->user_status == '0') Pending @endif
                                @if($exp_order->user_status == '1') User Confirmed @endif
                            </td>
                            @else
                            <td><a href="#" class="btn disabled">Canceled</a></td>
                            @endif
                            <td class="center"><a href="{{url('admin/express-orders/'.$exp_order->id)}}"
                                    class="btn btn-sm light-blue">{{__('order.Details')}}</a>
                                @if($exp_order->user_status == '1')
                                <a href="{{route('admin.print_express_order',$exp_order->id)}}" target="_blank"
                                    class="btn">{{__('order.Print')}}</a>
                                @endif
                            </td>

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
