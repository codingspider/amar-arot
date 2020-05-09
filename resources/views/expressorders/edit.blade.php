@extends('layouts.app')
@section('pagetitle','Purchase-AmarArot')
@section('contents')
<div class="container">
    <div class="section">
        <div class="row">
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
    <div class="section">
        <div class="row">
            <div class="col s12">
                <h4>Please add your bazar list</h4>

            </div>
            <div class="col s12" style="overflow-x:scroll;">
                <form action="{{route('express-orders.update',$id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <table id="myTable" class="order-list striped" style="min-width: 500px;">
                        <thead>
                            <tr>
                                <th width="30%">{{__('product.Product Name bn')}}</th>
                                <th width="30%">{{__('cart.brand')}}</th>
                                <th width="10%">{{__('cart.Quantity')}}</th>
                                <th width="20%">{{__('cart.Unit')}}</th>
                                <th width="10%">}</th>
                            </tr>
                        </thead>
                        <style>
                            .suggest{
                                position: absolute;
                                z-index: 5;
                            }
                        </style>
                        <tbody>
                            @foreach($express_order_details as $key=>$item)
                            <tr>
                                <td>
                                    <div class="input-field inline" style="width: 100% !important;">
                                        <i class="material-icons" type="button" id="mic-icon{{$key}}"
                                            onclick="voice_input('#product{{$key}}','#mic-icon{{$key}}')">keyboard_voice</i>
                                        <input type="text" id="product{{$key}}"
                                        onkeyup="productSugest('#product{{$key}}','#suggest{{$key}}')"
                                            class="input-field" autocomplete="off" value="{{ $item->name}}"
                                            name="name[]" required>
                                        <div id="suggest" class="suggest"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-field inline" style="width: 100% !important;">
                                        <i class="material-icons" type="button" id="mic-icon-brand{{$key}}"
                                            onclick="voice_input('#brand{{$key}}','#mic-icon-brand{{$key}}')">keyboard_voice</i><input
                                            type="text" id="brand{{$key}}"
                                            value="{{$item->brand}}" name="brand[]">
                                    </div>
                                </td>
                                <td>
                                    <input type="number" class="input-field" autocomplete="off" value="{{ $item->qty}}"
                                        name="qty[]" required />
                                </td>
                                <td>
                                    <select name="unit[]" required class="validated">
                                        @foreach($units as $unit)
                                        <option value="{{$unit->name}}" @if($unit->name ==$item->unit) selected
                                            @endif>{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <i class="material-icons ibtnDel" style="cursor: pointer;">delete_forever</i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="" style="text-align: left;">
                                    <input type="button" class="btn" id="addrow" value="{{__('cart.Add Row')}}" />
                                </td>
                                <td colspan="4" style="text-align: right;">
                                    <input type="submit" class="btn" value="{{__('cart.Order')}}" />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>

        </div>
    </div>
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
            console.log(counter);
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><div class="input-field inline" style="width: 100% !important;"><i class="material-icons prefix" type="button" id="mic-icon' + counter + '" onclick=voice_input("#product' + counter + '","#mic-icon' + counter + '")>keyboard_voice</i><input type="text" placeholder="Product Name" id="product' + counter + '" onkeyup=productSugest("#product' + counter + '","#suggest' + counter + '") class="input-field" autocomplete="off" value="{{old("name")}}" name="name[]" required><div id="suggest' + counter + '" class="suggest"></div></div></td>';

            cols += '<td><div class="input-field inline" style="width: 100% !important;"><i class="material-icons prefix" type="button" id="mic-icon-brand' + counter + '" onclick=voice_input("#brand' + counter + '","#mic-icon-brand' + counter + '")>keyboard_voice</i><input type="text" id="brand' + counter + '" placeholder="Ex:N/A, Local"  name="brand[]"></div></td>';

            cols += '<td><input type="number" class="input-field" autocomplete="off" value="{{old("qty")}}" name="qty[]" required/></td>';
            cols += '<td><select name="unit[]" required class="validated">@foreach($units as $unit)<option value="{{$unit->name}}">{{$unit->name}}</option>@endforeach</select></td>';

            cols += '<td><i class="material-icons ibtnDel" style="cursor: pointer;">delete_forever</i></td>';
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
</script>
@endsection
