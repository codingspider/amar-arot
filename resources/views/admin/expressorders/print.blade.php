<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__('order.Order no')}}- {{$express_order->id}}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        #contact{
            font-family: arial, sans-serif;
            width: 100%;
            border: none;
        }
        #contact td{
            border: none;
            line-height: 5px;;
        }
        h1{
            text-align: center;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="div">
        <h1>Amar Arot</h1>

        <table id="contact">
            <tr>
                <td>{{__('order.Buyer Name')}}</td>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <td>{{__('product.Phone')}}</td>
                <td> {{$user->phone}}</td>
            </tr>
            <tr>
                <td>{{__('order.Address')}}</td>
                <td>@if(!empty($address->address_line_1)){{$address->address_line_1}}@endif @if(!empty($address->name)){{$address->name}}@endif</td>
            </tr>
            <tr>
                <td>{{__('order.Date')}}:</td>
                <td>{{$express_order->created_at}}</td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <br>
    <table>
        <thead>
            <tr>
                <th>{{__('product.Product Name bn')}}</th>
                <th>{{__('cart.brand')}}</th>
                <th>{{__('cart.Quantity')}}</th>
                @if($express_order->status == 'Confired' || $express_order->status == 'Processing')
                <th>{{__('cart.Unit Price')}}</th>
                <th>{{__('cart.Sub Total')}}</th>
                @endif
            </tr>
        </thead>
        <tbody>
        <tbody>
            @foreach($express_order_details as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->brand}}</td>
                <td>{{$item->qty}}</td>
                @if($item->unit_price)
                <td>{{$item->unit_price}}</td>
                <td>{{$item->unit_price*$item->qty}}</td>
                @php
                $total_price += $item->unit_price*$item->qty;
                @endphp
                @endif
            </tr>
            @endforeach


        </tbody>
        <tfoot>
            @if($express_order->status == 'Confired'|| $express_order->status == 'Processing')
            <tr>
                <td colspan="4">{{__('cart.Total')}}</td>
                <td>{{$total_price}}</td>
            </tr>
            @endif
        </tfoot>
        </tbody>
    </table>
</body>

</html>
