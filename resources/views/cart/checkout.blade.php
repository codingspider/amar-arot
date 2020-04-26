<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Add billing details </title>
</head>
<body>
    <br>
    <div class="container">

        <?php
        $data = Cart::content();
        $cart = Cart::count();
        
        
        ?>
<div class="row">
        <div class="col-75">
          <div class="container">
            <form action="{{ URL::to('bkash/payment/success') }}" method="POST">
                @csrf
      
              <div class="row">
                <div class="col-50">

                  <h3>Billing Address</h3>
                  <div class="row">
                        <div class="col-50">
                          <label for="state">First Name</label>
                          <input style=" border: 1px solid black;" style=" border: 1px solid black;" type="text" id="state" name="first_name" placeholder="First Name">
                        </div>
                        <div class="col-50">
                          <label for="zip">Last Name</label>
                          <input style=" border: 1px solid black;" type="text" id="zip" name="last_name" placeholder="Last Name">
                        </div>
                      </div>
                  <label for="fname"><i class="fa fa"></i> Company Name </label>
                  <input style=" border: 1px solid black;" type="text" id="fname" name="company" placeholder="Copany Name">
                  <label for="fname"><i class="fa fa"></i> Select Country </label>

                  
                  <br>
                  
                  <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                  <input style=" border: 1px solid black;" type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                  <label for="city"><i class="fa fa-institution"></i> City</label>
                  <input style=" border: 1px solid black;" type="text" id="city" name="city" placeholder="New York">
      
                  <div class="row">
                    <div class="col-50">
                      <label for="state">State</label>
                      <input style=" border: 1px solid black;" type="text" id="state" name="state" placeholder="NY">
                    </div>
                    <div class="col-50">
                      <label for="zip">Zip</label>
                      <input style=" border: 1px solid black;" type="text" id="zip" name="postal" placeholder="10001">
                    </div>
                    
                  </div>
                  <label for="email"><i class="fa fa-"></i> Email</label>
                  <input style=" border: 1px solid black;" type="text" id="email" name="email" placeholder="john@example.com">
                  <br>
                  <label for="email"><i class="fa fa-"></i> Phone </label>
                  <input style=" border: 1px solid black;" type="text" id="email" name="phone" placeholder="john@example.com">
                </div>
                @foreach ($data as $item)
                    

            @endforeach

            <input type="hidden" name="course" value="{{ $item->name }}">
            <input type="hidden" name="method" value="Bkash">
            <input type="hidden" name="status" value="Active">
            <input type="hidden" name="course_name" value="{{ $item->name }}">
            <input type="hidden" name="total" value="{{ $newSubtotal }}">
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
 
                <div class="col-50">
                  <h3>Payment</h3>
                  <div class="icon-container">
                    <img src="https://www.putulhost.com/wp-content/uploads/2017/04/BKASH-LOGO.png" style="width:150px" alt="">
                  
                  </div>
                  <label for="cname">Bkash Transaction Number</label>
                  <input style=" border: 1px solid black;" type="text" id="cname" name="transaction" placeholder="HFDO65DSF" required>
                  
               
                </div>
      
              </div>
            
              <input type="submit" value="Pay Now" class="btn">
            </form>
          </div>
        </div>
      
        <div  class="col-25">
          <div style=" border: 1px solid black;" class="container">
            <h4>Cart 
              <span class="price" style="color:black">
                <i class="fa fa-shopping-cart"></i> 
              <b>{{ Cart::count() }}</b>
              </span>
            </h4>
            @foreach ($data as $item)
                
            <p><a href="#">{{ $item->name }}</a> <span class="price">৳ {{ $item->price }}</span></p>

            @endforeach
        
            <hr>
        @if(session()->get('coupon')['discount'] != null)
        <p>Discount <span class="price" style="color:black"><b>৳ {{ session()->get('coupon')['discount'] }}%</b></span></p>
        @endif 
        <hr>
        <p>Total <span class="price" style="color:black"><b>৳ {{ $newSubtotal }} with tax.</b></span></p>
          </div>
        </div>
      </div>
    </div>
</body>
</html>