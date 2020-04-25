@extends('layouts.app')
@section('pagetitle','Purchase-AmarBazar')
@section('contents')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">{{__('welcome.Amar Bazar')}}</h1>
        <div class="row center">
            <h5 class="header col s12 light">{{__('welcome.Everything together')}}</h5>
            <form action="{{route('search')}}" method="GET" id="search-form">
                <div class="input-field inline">
                    <i class="material-icons prefix" type="button" id="mic-icon">keyboard_voice</i>
                    <input id="search" name="search" type="text" value="{{ app('request')->input('search') }}"
                        class="validate">
                    <label for="search">{{__('product.Search Box')}}</label>
                    <p class="info"></p>

                </div>
                <div class="input-field inline">
                    <button class="btn btn-sm light-blue" type="submit">{{__('product.Search')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="section">
        <div class="row">
            <div class="col s12" id="map" style="height: 400px;"></div>
        </div>

        <div class="row">
            @if(count($products)>0)
            @foreach($products as $product)
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{asset('uploads/'.$product->image)}}">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{$product->name}}<i
                                class="material-icons right">more_vert</i></span>
                        <p><a href="#" class="btn light-blue">{{__('product.Add to Bag')}}</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">{{$product->name}}<i
                                class="material-icons right">close</i></span>
                        <ul>
                            <li>{{__('product.Price')}} {{$product->price}}{{__('cart.Taka')}} {{__('cart.Kg')}}</li>
                            <li>{{__('product.Minimum Order')}} {{$product->stock_qty}}{{__('cart.Kg')}} </li>
                            <li>{{__('product.Place')}} {{$product->location}}</li>
                            <li>{{__('product.Seller')}} {{$product->seller_name}}</li>
                            <li>{{__('product.Phone')}} {{$product->phone}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col s12 m12">
                <div class="card">
                    <h2 class="center-align">No Product Found</h2>
                </div>
            </div>
            @endif
        </div>

    </div>
    <br><br>
</div>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="{{url('cart')}}">
        <i class="large material-icons">add_shopping_cart</i>
    </a>
</div>
@endsection
@section('script')
<script>
    const searchForm = document.querySelector("#search-form");
    const searchFormInput = document.querySelector("#search"); // <=> document.querySelector("#search-form input");
    const info = document.querySelector(".info");

    // The speech recognition interface lives on the browser’s window object
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition; // if none exists -> undefined

    if (SpeechRecognition) {
        console.log("Your Browser supports speech Recognition");
        const recognition = new SpeechRecognition();
        recognition.continuous = true;
        const micBtn = document.querySelector("#mic-icon");
        // const micIcon = micBtn.innerHTML;
        micBtn.addEventListener("click", micBtnClick);
        function micBtnClick() {
            if (micBtn.innerHTML == "keyboard_voice") { // Start Voice Recognition
                recognition.start(); // First time you have to allow access to mic!
            }
            else {
                recognition.stop();
            }
        }
        recognition.addEventListener("start", startSpeechRecognition); // <=> recognition.onstart = function() {...}
        function startSpeechRecognition() {
            document.querySelector("#mic-icon").innerHTML = "record_voice_over";
            searchFormInput.focus();
            console.log("Voice activated, SPEAK");

        }
        recognition.addEventListener("end", endSpeechRecognition); // <=> recognition.onend = function() {...}
        function endSpeechRecognition() {
            document.querySelector("#mic-icon").innerHTML = "keyboard_voice";
            console.log("Speech recognition service disconnected");
        }
        recognition.addEventListener("result", resultOfSpeechRecognition); // <=> recognition.onresult = function(event) {...} - Fires when you stop talking
        function resultOfSpeechRecognition(event) {
            const current = event.resultIndex;
            const transcript = event.results[current][0].transcript;
            searchFormInput.value = transcript;
            searchFormInput.focus();
            setTimeout(() => {
                searchForm.submit();
            }, 500);
        }
    }
    else {
        console.log("Your Browser does not support speech Recognition");
        info.textContent = "Your Browser does not support Speech Recognition";
    }
</script>
<script>
    var map;

    function initMap() {


        var buyer_lat = 23.7235301; // Buyer Latitude
        var buyer_lng = 90.3486647; // Buyer Logitude
        var buyer = new google.maps.LatLng(buyer_lat, buyer_lng);

        var seller1 = new google.maps.LatLng(23.8235301, 90.3486647); // Seller Lat and Lng
        var seller2 = new google.maps.LatLng(23.7739913, 90.4137115); // Seller Lat and Lng


        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(buyer_lat, buyer_lng),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: 9
        });


        var locations = [
            buyer,
            seller1,
            seller2
        ];

        var count = 1;
        locations.forEach(function (location) {
            if (count == 1) {
                var image = '{{asset("content/img/icon.png")}}';
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    icon: image
                });
            } else {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }
            count++;
        });
        8
        var rad = function (x) {
            return x * Math.PI / 180;
        };

        // Distance Calculator
        var getDistance = function (p1, p2) {
            var R = 6378137; // Earth’s mean radius in meter
            var dLat = rad(p2.lat() - p1.lat());
            var dLong = rad(p2.lng() - p1.lng());
            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(rad(p1.lat())) * Math.cos(rad(p2.lat())) *
                Math.sin(dLong / 2) * Math.sin(dLong / 2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var d = R * c;
            return d; // returns the distance in meter
        };

        console.log('Distance to seler 1: ',getDistance(
            buyer,
            seller1
        ))
        console.log('Distance to seler 2: ',getDistance(
            buyer,
            seller2
        ))

    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
@endsection