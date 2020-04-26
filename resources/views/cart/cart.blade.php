<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Cart List </title>
</head>

<body>

    <div class="container">
        <br>
        <p class="text-center">Items in cart <a href="#" target="_blank"></a></p>

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


        <hr>


        @if(Cart::count() > 0)
        <h3> You have {{ Cart::count() }} products in your cart. </h3>
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-md-offset-1">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)

                            <tr>
                                <td class="col-sm-12 col-md-8">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="{{ url('details/'.$item->id )}}"> <img
                                                class="media-object" src="{{ asset('uploads/'.$item->model->image) }}"
                                                style="width: 50px; height: 50px;"> </a>
                                        <div class="media-body">
                                            <h5 style=" padding-left:20px;" class="media-heading"> <a
                                                    href="{{ url('details/'.$item->id )}}"> {{ $item->name }}</a></h5>

                                        </div>
                                    </div>
                                </td>
                                <td class="col-sm-2 col-md-2" style="text-align: center">
                                    <select class="quantity" data-id="{{ $item->rowId }}"
                                        data-productQuantity="{{ $item->model->quantity }}">
                                        @for ($i = 1; $i < 5 + 1 ; $i++) <option
                                            {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td class="col-sm-2 col-md-2 text-center"><strong>৳ {{ $item->price  }}</strong></td>
                                <td class="col-sm-2 col-md-2 text-center"><strong>৳
                                        {{ $item->price * $item->qty }}</strong></td>
                                <td class="col-md-4">
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                    <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}

                                        <button type="submit" class="cart-options">Save for Later</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                @if (session()->has('coupon'))
                                <td>
                                    <h5>Discount ({{ session()->get('coupon')['name'] }}) </h5>
                                </td>
                                <td class="text-right text-center">
                                    <h5><strong>-৳ {{ session()->get('coupon')['discount'] }} %</strong></h5>
                                </td>
                                <form action="{{ route('coupon.destroy') }}" method="POST">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <td><button class="btn btn-danger" type="submit">Remove </button></td>
                                </form>
                                @endif
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <h5>TAX</h5>
                                </td>
                                <td class="text-right">
                                    <h5><strong>৳ {{ Cart::tax() }}</strong></h5>
                                </td>
                            </tr>
                            @if (session()->has('coupon'))
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td> </td>
                                <td>
                                    <h3>Discount</h3>
                                </td>
                                <td class="text-right">
                                    <h3><strong>৳ {{ $discount }}</strong></h3>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td> </td>
                                <td>
                                    <h3>Total</h3>
                                </td>
                                <td class="text-right">
                                    <h3><strong>৳ {{ $newSubtotal }}</strong></h3>
                                </td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <button type="button" class="btn btn-default">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                    </button></td>
                                <td>
                                    <button type="button" class="btn btn-success">
                                        Checkout <span class="glyphicon glyphicon-play"></span>
                                    </button></td>
                            </tr>
                            <tr>
                                <td>
                                    @if (! session()->has('coupon'))

                                    <a href="#" class="have-code">Have a Code?</a>

                                    <div class="have-code-container">
                                        <form action="{{ route('coupon.store') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="text" name="coupon_code" id="coupon_code">
                                            <button type="submit" class="button button-plain">Apply</button>
                                        </form>
                                    </div> <!-- end have-code-container -->
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @else
        <h3 class="text-center">There is no items in your cart! </h3>
        <a class="btn btn-primary" href="{{ url('/home')}}"> Shop Now </a>
        @endif

        @if (Cart::instance('saveForLater')->count() > 0)

        <h2>{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later</h2>
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-md-offset-1">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>

                                <th class="text-center">Price</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::instance('saveForLater')->content() as $item)

                            <tr>
                                <td class="col-sm-12 col-md-8">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="{{ url('details/'.$item->id )}}"> <img
                                                class="media-object" src="{{ asset('uploads/'.$item->model->image) }}"
                                                style="width: 50px; height: 50px;"> </a>
                                        <div class="media-body">
                                            <h5 style=" padding-left:20px;" class="media-heading"> <a
                                                    href="{{ url('details/'.$item->id )}}"> {{ $item->name }}</a></h5>

                                        </div>
                                    </div>
                                </td>

                                <td class="col-sm-2 col-md-2 text-center"><strong>৳ {{ $item->price  }}</strong></td>

                                <td class="col-md-4">
                                    <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>

                                    <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}

                                        <button type="submit" class="cart-options">Move to Cart</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @else
        <h3 class="text-center">You have no items saved for later. </h3>

        @endif
    </div>
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
                            // console.log(response);
                            window.location.href = "{{ route('cart.index') }}"
                        })
                        .catch(function (error) {
                            // console.log(error);
                            window.location.href = "{{ route('cart.index')}}"
                        });
                })
            })
        })();
    </script>
</body>

</html>
