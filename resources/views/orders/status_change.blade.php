@extends('layouts.app')

@section('contents')
    <div class="container">

        @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
        <table>
        <thead>
          <tr>
              <th>Name</th>
              <th>Item Stock</th>
              <th>Item Price</th>
              <th>Action </th>
          </tr>
        </thead>

        <tbody>
            @foreach ($order as $item)
                
          <tr>
          <td>{{ $item->name }}</td>
          <td>{{ $item->stock_qty}}</td>
          <td>{{ $item->price }}</td>

            <td>
            <form action="{{ URL::to('change/order/status/form')}}" method="POST">
                @csrf
            <input type="hidden" name="id" value="{{ $item->status}}">
                <select name="name" id="myselect" onchange="this.form.submit()">
                    <option value="Confirmed">Confirmed</option>
                    <option value="Courier">Courier</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </form>
            </td>
          </tr>
            @endforeach

          
        </tbody>
      </table>
    </div>
@endsection