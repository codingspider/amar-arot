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
<br>  <p class="text-center">Items in cart <a href="#" target="_blank"></a></p>

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
<h3> You have  {{ Cart::count() }} products in your cart. </h3>
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
                        <a class="thumbnail pull-left" href="{{ url('product/details/'.$item->id )}}"> <img class="media-object" src="{{ asset('uploads/'.$item->model->image) }}" style="width: 50px; height: 50px;"> </a>
                            <div class="media-body">
                            <h5 style=" padding-left:20px;" class="media-heading"> <a href="{{ url('product/details/'.$item->id )}}"> {{ $item->name }}</a></h5>

                            </div>
                        </div></td>
                        <td class="col-sm-2 col-md-2" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $item->qty }}">
                        </td>
                        <td class="col-sm-2 col-md-2 text-center"><strong>৳ {{ $item->price  }}</strong></td>
                        <td class="col-sm-2 col-md-2 text-center"><strong>৳ {{ $item->price * $item->qty }}</strong></td>
                        <td class="col-sm-2 col-md-2">
                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                    <td class="text-right"><h5><strong>৳ {{ Cart::subtotal() }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>TAX</h5></td>
                    <td class="text-right"><h5><strong>৳ {{ Cart::tax() }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong>৳ {{ Cart::total()}}</strong></h3></td>
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
                </tbody>
            </table>
        </div>
    </div>
</div>
@else 
    <h3 class="text-center">There is no items in your cart! </h3>
<a class="btn btn-primary" href="{{ url('/home')}}"> Shop Now </a>
@endif 
</div> 
<!--container end.//-->

</body>
</html>