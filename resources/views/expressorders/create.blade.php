@extends('layouts.app')
@section('pagetitle','Purchase-AmarArot')
@section('contents')
<div class="container">
    <div class="section">
        <div class="row">
            <div class="col s12">
                <h4 class="center-align">Please add your product list</h4>
            </div>
            <div class="col s12">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-success">
                    {{ session()->get('error') }}
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
    <form action="{{route('express-orders.store')}}" method="POST">
        @csrf
        <div class="section">
            <div class="row">
                <div class="col s12" style="overflow-x:scroll;">
                    <table id="myTable" class="order-list" style="min-width: 500px;">
                        <thead>
                            <tr>
                                <th width="30%">{{__('product.Product Name bn')}}</th>
                                <th width="30%">{{__('cart.brand')}}</th>
                                <th width="10%">{{__('cart.Quantity')}}</th>
                                <th width="20%">{{__('cart.Unit')}}</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <style>
                            .suggest{
                                position: absolute;
                                z-index: 5;
                            }
                        </style>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="input-field inline" style="width: 100% !important;">
                                        <i class="material-icons" type="button" id="mic-icon"
                                            onclick="voice_input('#product','#mic-icon')">keyboard_voice</i>
                                        <input type="text" id="product" onkeyup="productSugest('#product','#suggest')"
                                            autocomplete="off" value="{{old('name')}}" name="name[]" required>
                                        <div id="suggest" class="suggest"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-field inline" style="width: 100% !important;">
                                        <i class="material-icons" type="button" id="mic-icon-brand"
                                            onclick="voice_input('#brand','#mic-icon-brand')">keyboard_voice</i>
                                        <input type="text" id="brand" value="{{old('brand')}}" name="brand[]">
                                    </div>
                                </td>
                                <td>
                                    <i class="material-icons"></i>
                                    <input type="number" class="input-field" autocomplete="off"
                                        value="{{old('qty') ? old('qty') : 1 }}" name="qty[]" value="0" step="0.01"
                                        class="validated" required />
                                </td>
                                <td>
                                    <select name="unit[]" required>
                                        @foreach($units as $unit)
                                        <option value="{{$unit->name}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <i class="material-icons ibtnDel" style="cursor: pointer;">delete_forever</i>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="" style="text-align: left;">
                                    <input type="button" class="btn" id="addrow" value="{{__('cart.Add Row')}}" />
                                </td>
                                <td colspan="4" style="text-align: right;">

                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
        <div class="section">
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Billing Address</span>
                            <div class="row">
                                <input type="hidden" name="billing_id"
                                    value="@if(!empty($billing->id)){{$billing->id}}@endif">
                                <div class="input-field col s12 m8">
                                    <input id="billing_address"
                                        value="@if(!empty($billing->address_line_1)){{$billing->address_line_1}}@endif"
                                        name="billing_address" type="text" class="validate" required=""
                                        aria-required="true">
                                    <label for="billing_address">Billing Address</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <select name="billing_district" id="billing_district" class="validate" required=""
                                        aria-required="true">
                                        <option value="">Your District</option>
                                        @foreach($districts as $district)
                                        <option value="{{$district->id}}" @if(!empty($billing->name)) @if($billing->name
                                            == $district->name) selected @endif @endif>{{$district->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="billing_district">District</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>
                        <input type="checkbox" name="shipping" value="shipping" id="checkbox" />
                        <span>Same as Billing Address</span>
                    </label>
                    <div class="card" id="shiping">
                        <div class="card-content">
                            <span class="card-title">Shipping Address</span>
                            <div class="row">
                                <input type="hidden" name="shipping_id"
                                    value="@if(!empty($shipping->id)){{$shipping->id}}@endif">
                                <div class="input-field col s12 m8">
                                    <input id="shipping_address" name="shipping_address"
                                        value="@if(!empty($shipping->address_line_1)){{$shipping->address_line_1}}@endif"
                                        type="text" class="validate" required="" aria-required="true">
                                    <label for="shipping_address">Shipping Address</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <select name="shiping_district" id="shiping_district" class="validate" required=""
                                        aria-required="true">
                                        <option value="">Your District</option>
                                        @foreach($districts as $district)
                                        <option value="{{$district->id}}" @if(!empty($shipping->name))
                                            @if($shipping->name == $district->name) selected @endif
                                            @endif>{{$district->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="shiping_district">District</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <input type="submit" class="btn" value="{{__('cart.Order')}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    function voice_input(product, micicon) {
        const searchFormInput = document.querySelector(product); // <=> document.querySelector("#search-form input");

        // The speech recognition interface lives on the browser’s window object
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition; // if none exists -> undefined

        if (SpeechRecognition) {
            console.log("Your Browser supports speech Recognition");
            const recognition = new SpeechRecognition();
            recognition.lang = "{{App::getLocale()}}";

            recognition.continuous = true;
            const micBtn = document.querySelector(micicon);
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
                document.querySelector(micicon).innerHTML = "record_voice_over";
                searchFormInput.focus();
                console.log("Voice activated, SPEAK");

            }
            recognition.addEventListener("end", endSpeechRecognition); // <=> recognition.onend = function() {...}
            function endSpeechRecognition() {
                document.querySelector(micicon).innerHTML = "keyboard_voice";
                console.log("Speech recognition service disconnected");
            }
            recognition.addEventListener("result", resultOfSpeechRecognition); // <=> recognition.onresult = function(event) {...} - Fires when you stop talking
            function resultOfSpeechRecognition(event) {
                const current = event.resultIndex;
                const transcript = event.results[current][0].transcript;
                searchFormInput.value = transcript;
                searchFormInput.focus();
                setTimeout(() => {
                    recognition.stop();
                }, 500);
            }
        }
        else {
            console.log("Your Browser does not support speech Recognition");
            info.textContent = "Your Browser does not support Speech Recognition";
        }
    }
</script>
<script>
    function productSugest(product, suggest) {
        $(document).ready(function () {
            $(product).keypress(function () {
                var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url: "{{url('ajax/express-orders-product-list')}}",
                        method: "POST",
                        data: { product_name: query },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        success: function (data) {
                            console.log
                            $(suggest).fadeIn();
                            $(suggest).html(data);

                        }
                    });
                }


            });
            $(document).on('click', suggest + ' li', function () {
                // console.log(product)
                $(product).val($(this).text());
                $(suggest).fadeOut();
            });

        });


    }

    $(document).ready(function () {
        var counter = 0;
        var limit = 100;

        $("#addrow").on("click", function () {

            counter = $('#myTable tr').length - 2;

            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><div class="input-field inline" style="width: 100% !important;"><i class="material-icons" type="button" id="mic-icon' + counter + '" onclick=voice_input("#product' + counter + '","#mic-icon' + counter + '")>keyboard_voice</i><input type="text" id="product' + counter + '" onkeyup=productSugest("#product' + counter + '","#suggest' + counter + '") class="input-field" autocomplete="off" value="{{old("name")}}" name="name[]" required><div id="suggest' + counter + '" class="suggest"></div></td></div>';

            cols += '<td><div class="input-field inline" style="width: 100% !important;"><i class="material-icons" type="button" id="mic-icon-brand' + counter + '" onclick=voice_input("#brand' + counter + '","#mic-icon-brand' + counter + '")>keyboard_voice</i><input type="text" id="brand' + counter + '"  name="brand[]"></div></td>';

            cols += '<td><i class="material-icons"></i><input type="number" class="input-field" autocomplete="off" value="1" style="margin-bottom: 8px;" name="qty[]" value="0" step="0.01" class="validated" required/></td>';

            cols += '<td><select name="unit[]" required class="validated">@foreach($units as $unit) <option value="{{$unit->name}}">{{$unit->name}}</option>@endforeach</select></td>';

            cols += '<td><i class="ibtnDel material-icons" style="cursor: pointer;">delete_forever</i></td>';
            newRow.append(cols);
            if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
            $("table.order-list").append(newRow);
            counter++;
            $('select').formSelect();

        });
        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
            $('#addrow').attr('disabled', false).prop('value', "Add Row");
        });
    });

    $(document).ready(function () {
        $('#checkbox').on("click", function () {
            if ($('#shiping').css("display") === "none") {
                $('#shiping').css("display", "block");
                $('#checkbox').val("shipping");
                $('#shiping_district').attr('required', "");
                $('#shiping_district').attr('aria-required', "true");
                $('#shipping_address').attr('required', "");
                $('#shipping_address').attr('aria-required', "true");

            } else {
                $('#shiping').css("display", "none");
                $('#checkbox').val("billing");
                $('#shiping_district').removeAttr('required');
                $('#shiping_district').removeAttr('aria-required');
                $('#shipping_address').removeAttr('required');
                $('#shipping_address').removeAttr('aria-required');
            }
        })
    });
</script>
@endsection