@extends('layouts.app')
@section('pagetitle','Cart-AmarBazar')

@section('contents')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">{{__('welcome.Amar Bazar')}}</h1>
        <div class="row center">
            <h5 class="header col s12 light">{{__('welcome.Everything together')}}</h5>
        </div>
    </div>
</div>


<div class="container">
    <div class="section">
        <div class="row">
            <div class="col s12">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="section">
        <!--   Icon Section   -->
        @if(Cart::count() > 0)

        <div class="row">
            <div class="col s12">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th width="20%">{{__('cart.Product Name')}}</th>
                            <th width="15%">{{__('cart.Quantity')}}</th>
                            <th width="20%">{{__('cart.Unit Price')}}</th>
                            <th width="20%">{{__('cart.Sub Total')}}</th>
                            <th width="25%">{{__('Action')}}</th>
                        </tr>
                    </thead>

                    <tbody class="center-align">
                        @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <a href="{{ url('details/'.$item->id )}}">{{ $item->name }}</a>
                            </td>
                            <td>
                                <select class="quantity input-field" data-id="{{ $item->rowId }}"
                                    data-productQuantity="{{ $item->qty }}">
                                    @for ($i = 1; $i < 5 + 1 ; $i++) <option
                                        {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                            <td>
                                {{ $item->price  }}{{__('cart.Taka')}}
                            </td>
                            <td>
                                {{ $item->price * $item->qty }}{{__('cart.Taka')}}
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s3">
                                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="material-icons ">delete_forever
                                                </i></button>
                                        </form>

                                    </div>
                                    <div class="col s9 right-align">
                                        <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}"
                                            method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="waves-effect waves-light btn">Save for
                                                Later</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if (session()->has('coupon'))
                        <tr>

                            <td colspan="3">
                                <h3>Discount</h3>
                            </td>
                            <td class="text-right">
                                <h3><strong>৳ {{ $discount }}</strong></h3>
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <td colspan="3">
                                <a type="button" class="btn btn-default" href="{{url('/home')}}">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                </a>
                            </td>
                            <td colspan="2" class="right-align">
                            <a href="{{ url('/checkout') }}" class="btn light-blue right waves-effect waves-light">{{__('cart.Confirm')}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                @if (! session()->has('coupon'))
                                <a href="#" class="have-code">Have a Code?</a>
                                <div class="have-code-container">
                                    <form action="{{ route('coupon.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row right-align">
                                            <div class="col s6">
                                                <input type="text" class="form-input" name="coupon_code"
                                                    id="coupon_code">
                                            </div>
                                            <div class="col s6">
                                                <input type="submit" class="btn btn form-input" value="Apply">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="center">{{__('cart.Total')}} {{ $newSubtotal }} {{__('cart.Taka')}}</p>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col s12 center-align">
                <h3 class="text-center">There is no items in your cart! </h3>
                <a class="btn btn-primary" href="{{ url('/home')}}"> Shop Now </a>
            </div>
        </div>
        @endif
    </div>

    <div class="section">
        @if (Cart::instance('saveForLater')->count() > 0)
        <div class="row">
            <div class="col s12">
                <h3 class="center-align">{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later</h3>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th width="20%">{{__('cart.Product Name')}}</th>
                            <th width="15%">{{__('cart.Quantity')}}</th>
                            <th width="20%">{{__('cart.Unit Price')}}</th>
                            <th width="20%">{{__('cart.Sub Total')}}</th>
                            <th width="25%">{{__('Action')}}</th>
                        </tr>
                    </thead>

                    <tbody class="center-align">
                        @foreach (Cart::instance('saveForLater')->content() as $item)
                        <tr>
                            <td>
                                <a href="{{ url('details/'.$item->id )}}">{{ $item->name }}</a>
                            </td>
                            <td>
                                {{$item->qty}}
                            </td>
                            <td>
                                {{ $item->price  }}{{__('cart.Taka')}}
                            </td>
                            <td>
                                {{ $item->price * $item->qty }}{{__('cart.Taka')}}
                            </td>


                            <td class="right-align">
                                <div class="row">
                                    <div class="col s3">
                                        <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="material-icons ">delete_forever
                                                </i></button>
                                        </form>

                                    </div>
                                    <div class="col s9">
                                        <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}"
                                            method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="waves-effect waves-light btn">Move to
                                                cart</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        @else

        <div class="row">
            <div class="col s12 ">
                <h3 class="center-align">You have no items saved for later. </h3>
            </div>
        </div>
        @endif

    </div>


</div>
@endsection
@section('script')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    (function () {
        const classname = document.querySelectorAll('.quantity')
        Array.from(classname).forEach(function (element) {
            element.addEventListener('change', function () {
                const id = element.getAttribute('data-id')
                const productQuantity = element.getAttribute('data-productQuantity')
                axios.patch(`/cart/${id}`, {
                    quantity: this.value,
                    productQuantity: productQuantity
                })
                    .then(function (response) {
                        console.log(response);
                        window.location.href = "{{ route('cart.index') }}"
                    })
                    .catch(function (error) {
                        console.log(error);
                        window.location.href = "{{ route('cart.index')}}"
                    });
            })
        })
    })();
</script>
@endsection
