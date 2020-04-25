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
<div class="card">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" width="200" class="text-right">Action</th>
</tr>
</thead>
<tbody>

@foreach (Cart::content() as $item)
        
<tr>
	<td>
<figure class="media">
<div class="img-wrap"><img src="{{ asset('uploads/'.$item->model->image) }}" class="img-thumbnail img-sm"></div>
	<figcaption class="media-body">
		<h6 class="title text-truncate">Product name goes here </h6>
	</figcaption>
</figure> 
	</td>
	<td> 
		<select class="form-control">
			<option>1</option>
			<option>2</option>	
			<option>3</option>	
			<option>4</option>	
		</select> 
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">USD 145</var> 
			<small class="text-muted">(USD5 each)</small> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<a title="" href="" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Save to Wishlist"> <i class="fa fa-heart"></i></a> 
	<a href="" class="btn btn-outline-danger"> × Remove</a>
	</td>
</tr>

    @endforeach

</tbody>
</table>
</div> <!-- card.// -->
@else 
    <h3 class="text-center">There is no items in your cart! </h3>
@endif 
</div> 
<!--container end.//-->

</body>
</html>