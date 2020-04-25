*@extends('layouts.app')
@section('pagetitle','Purchase-AmarBazar')
@section('contents')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">{{__('welcome.Amar Bazar')}}</h1>
        <div class="row center">
            <h5 class="header col s12 light">{{__('welcome.Everything together')}}</h5>
            <form action="{{route('search')}}" method="POST" id="search-form">
                @csrf
                <div class="input-field inline">
                    <i class="material-icons prefix" type="button" id="mic-icon">keyboard_voice</i>
                    <input id="search" name="search" type="text" class="validate">
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
            @foreach($categories as $category)
            <div class="col s12 m12">
                <h2 class="center-align">{{ $category->name}}</h2>
            </div>
            @foreach($products as $product)
            @if($product->catagory_id == $category->id)
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{asset('uploads/'.$product->image)}}">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{$product->name}}<i
                                class="material-icons right">more_vert</i></span>
                        {{-- <p><a href="#" class="btn light-blue">{{__('product.Add to Bag')}}</a></p> --}}
                        <form action="{{ route('cart.store')}}" method="POST">
                            @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <button class="btn light-blue" type="submit">Add to cart </button>

                        </form>
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
            @endif
            @endforeach
            @endforeach
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
@endsection
