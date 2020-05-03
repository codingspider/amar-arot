@extends('layouts.app')
@section('pagetitle','Purchase-AmarBazar')
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
            <div class="col s12">
                <form action="{{route('express-orders.update',$id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <table id="myTable" class="order-list striped responsive-table">
                        <thead>
                            <tr>
                                <td width="65%">Name</td>
                                <td width="15%">Brand</td>
                                <td width="10%">Quantity</td>
                                <td width="10%">Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($express_order_details as $item)
                            <tr>
                                <td>
                                    <input type="text" id="product" onclick="productSugest('#product','#suggest')"
                                        class="input-field" autocomplete="off" value="{{ $item->name}}" name="name[]" required>
                                    <div id="suggest"></div>
                                </td>
                                <td>
                                    <select class="input-field" autocomplete="off" value="{{old('brand')}}"
                                        name="brand[]">
                                        <option value="N/A" @if($item->brand == "N/A") selected @endif>N/A</option>
                                        <option value="Local" @if($item->brand == "Local") selected @endif>Local</option>
                                        <option value="ACI" @if($item->brand == "ACI") selected @endif>ACI</option>
                                        <option value="PRAN" @if($item->brand == "PRAN") selected @endif>PRAN</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="input-field" autocomplete="off" value="{{ $item->qty}}"
                                        name="qty[]" required/>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-red ibtnDel"  value="Delete">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="" style="text-align: left;">
                                    <input type="button" class="btn" id="addrow" value="Add Row" />
                                </td>
                                <td colspan="4" style="text-align: right;">
                                    <input type="submit" class="btn" value="Order" />
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

            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><input type="text" id="product' + counter + '" onclick=productSugest("#product' + counter + '","#suggest' + counter + '") class="input-field" autocomplete="off" value="{{old("name")}}" name="name[]" required><div id="suggest' + counter + '"></div></td>';
            cols += '<td><input type="text" class="input-field" autocomplete="off" value="{{old("brand")}}" name="brand[]" /></td>';
            cols += '<td><input type="text" class="input-field" autocomplete="off" value="{{old("qty")}}" name="qty[]" required/></td>';
            cols += '<td><input type="button" class="btn btn-red ibtnDel"  value="Delete"></td>';
            newRow.append(cols);
            if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
            $("table.order-list").append(newRow);
            counter++;
        });
        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
            $('#addrow').attr('disabled', false).prop('value', "Add Row");
        });
    });
</script>
@endsection
