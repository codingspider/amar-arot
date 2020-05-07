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
                            <th width="25%">{{__('cart.Action')}}</th>
                        </tr>
                    </thead>

                    <tbody class="center-align">
                        @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <a href="{{ url('details/'.$item->id )}}">{{ $item->name }}</a>
                            </td>
                            <td>
                                <form id="FormQty" action="{{ route('cart.update', $item->rowId) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="input-field">
                                        <input type="text" name="quantity" value="{{ $item->qty }}">
                                        <input type="hidden" name="p_id" value="{{ $item->id }}">
                                        <button class="btn red">Update</button>
                                    </div>

                                </form>
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
                                            <button type="submit" class="btn red"><i
                                                    class="material-icons ">delete_forever
                                                </i></button>
                                        </form>

                                    </div>
                                    <div class="col s9 right-align">
                                        <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}"
                                            method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit"
                                                class="waves-effect waves-light btn">{{__('cart.Save for Later')}}</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if (session()->has('coupon'))
                        <tr>
                            <td colspan="3">
                                <h6>Discount ({{ session()->get('coupon')['name'] }})</h6>
                            </td>
                            <td class="text-right">
                                <h6><strong>-৳ {{ session()->get('coupon')['discount'] }} %</strong></h6>
                            </td>
                            <td>
                                <form action="{{ route('coupon.destroy') }}" method="POST">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button class="btn btn-danger" type="submit"><i
                                            class="material-icons ">delete_forever
                                        </i> </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <td colspan="3">
                                <h6>TAX</h6>
                            </td>
                            <td class="text-right">
                                <h6><strong>৳ {{ Cart::tax() }}</strong></h6>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <a type="button" class="btn btn-default" href="{{url('/home')}}">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                    {{__('cart.Continue Shopping')}}
                                </a>
                            </td>
                            <td colspan="2" class="right-align">
                                <a href="{{ url('/checkout') }}"
                                    class="btn light-blue right waves-effect waves-light">{{__('cart.Confirm')}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                @if (! session()->has('coupon'))
                                <a href="#" class="have-code">{{__('cart.Have a Code?')}}</a>
                                <div class="have-code-container">
                                    <form action="{{ route('coupon.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row right-align">
                                            <div class="col s6">
                                                <input type="text" class="form-input" name="coupon_code"
                                                    id="coupon_code">
                                            </div>
                                            <div class="col s6">
                                                <button type="submit"
                                                    class="btn btn form-input">{{__('cart.Apply')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="center">{{__('cart.Total')}} {{ $newSubtotal }} {{__('cart.Taka')}} ( {{__('cart.vat')}} )</p>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col s12 center-align">
                <h3 class="text-center">{{__('cart.There is no items in your cart!')}} </h3>
                <a class="btn btn-primary" href="{{ url('/home')}}"> {{__('cart.Shop Now')}} </a>
            </div>
        </div>
        @endif
    </div>

    <div class="section">
        @if (Cart::instance('saveForLater')->count() > 0)
        <div class="row">
            <div class="col s12">
                <h3 class="center-align">{{ Cart::instance('saveForLater')->count() }} {{__('cart.item(s)')}}
                    {{__('cart.Saved For Later')}}</h3>
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
                            <th width="25%">{{__('cart.Action')}}</th>
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
                                            <button type="submit"
                                                class="waves-effect waves-light btn">{{__('cart.Move to Cart')}}</button>
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
