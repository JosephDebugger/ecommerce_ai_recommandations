@section('cssSources')
    <style>
        h1 {
            text-align: center;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .main-box {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
@endsection

@extends('front-master')

@section('content')
    <br><br>
    <h1> Checkout </h1>
    <div class="row">
        <div class="col-25">
            <div class="container">

                <div class="table-responsive">
                    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i>
                            <b>{{ count($products) }} </b></span></h4>
                    <table class="table activitites">
                        <thead>
                            <tr>
                                <th scope="col" class="text-uppercase header">item</th>
                                <th scope="col" class="text-uppercase">Quantity</th>
                                <th scope="col" class="text-uppercase">price each</th>
                                <th scope="col" class="text-uppercase">total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($products as $key => $item)
                                @php
                                    $total += $quantity[$key] * $item->price;
                                @endphp
                                <tr id="rowNo_{{ $key }}">
                                    <td class="item">
                                        <input type="text" id="productId_{{ $key }}"
                                            value="{{ $item->id }}">
                                        <div class="d-flex">

                                            <div class="pl-2">
                                                {{ $item->name }}

                                            </div>
                                    </td>
                                    <td id="quantity_{{ $key }}">{{ $quantity[$key] }}</td>
                                    <td class="d-flex flex-column"><input type="hidden" id="unitPrice_{{ $key }}"
                                            value="{{ $item->price }}"><span class="red">Tk {{ $item->price }}</span>
                                        {{-- <del class="cross">Tk {{$item->price}}</del> --}}
                                    </td>
                                    <td class="font-weight-bold">
                                        {{ $quantity[$key] * $item->price }}
                                        <div class="close" onclick="delRow({{ $key }})">&times;</div>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{-- <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{ count($products)}}  </b></span></h4>
          @foreach ($products as $key => $item)
          <p><a href="#">{{$item->name}}</a> <span class="price">{{$quantity[$key]*$item->price}}</span></p>
          @endforeach --}}


                <hr>
                <p>Total <span class="price" style="color:black"><b id="total_price">{{ $total }}</b></span></p>
                <br>
            </div>
        </div>
        <div class="col-75">
            <div class="container main-box">
                <form id="checkOutInfoForm" action="#">

                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="New York">

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="NY">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001">
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September">
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352">
                                </div>
                            </div>
                        </div>

                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <input type="submit" value="Continue to checkout" class="btn">
                </form>
                <br>
            </div>
        </div>


    </div>
    <br>
@endsection
@section('jsSources')
    <script>
        function delRow(no) {
            var unitPrice = parseFloat($('#unitPrice_' + no).val())
            var total_price = parseFloat($('#total_price').text());
            var quantity = parseFloat($('#quantity_' + no).text());

            var price = total_price - (unitPrice * quantity);

            $('#total_price').text(price);

            $('#rowNo_' + no).remove();
        }
        $(document).ready(function() {
            $("#checkOutInfoForm").submit(function(event) {


                event.preventDefault();
                paypal.minicart.reset();
                var productIds = [];
                $('input[id^="productId_"]').each(function() {
                    productIds.push($(this).val())
                })
                 $('td[id^="quantity_"]').each(function() {
                    productIds.push($(this).val())
                })
                alert(productIds)

                $.ajax({
                    type: "POST",
                    url: "process.php",
                    data: formData,
                    dataType: "json",
                    encode: true,
                }).done(function(data) {
                    console.log(data);
                });

            });
        });
    </script>
@endsection
