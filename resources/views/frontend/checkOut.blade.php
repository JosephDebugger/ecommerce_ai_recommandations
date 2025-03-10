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
    <div class="card">


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
                                        $price = $item->price - $item->discount;
                                        $total += $quantity[$key] * $price;

                                    @endphp
                                    <tr id="rowNo_{{ $key }}">
                                        <td class="item">
                                            <input type="hidden" id="productId_{{ $key }}"
                                                value="{{ $item->id }}" class="d-none">
                                            <div class="d-flex">

                                                <div class="pl-2">
                                                    {{ $item->name }}

                                                </div>
                                        </td>
                                        <td id="quantity_{{ $key }}">{{ $quantity[$key] }}</td>
                                        <td class="d-flex flex-column"><input type="hidden"
                                                id="unitPrice_{{ $key }}" value="{{ $price }}"><span
                                                class="red">Tk {{ $price }}</span>
                                            {{-- <del class="cross">Tk {{$item->price}}</del> --}}
                                        </td>
                                        <td class="font-weight-bold">
                                            {{ $quantity[$key] * $price }}
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
                    <p>Total <span class="price" style="color:black"><b id="total_price">{{ $total }}</b></span>
                    </p>
                    <br>
                </div>
            </div>
            <div class="col-75">
                <div class="container main-box">
                    <form id="checkOutInfoForm" method="post">

                        @csrf
                        <div class="row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" id="fname" name="firstname" placeholder="Enter Name"
                                    value="{{ $customerInfo ? $customerInfo->name : '' }}" required>
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="email" placeholder="Enter Email"
                                    value="{{ $customerInfo ? $customerInfo->email : '' }}">
                                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                <input type="text" id="adr" name="address" placeholder="Write Address"
                                    value="{{ $customerInfo ? $customerInfo->address : '' }}">
                                <label for="city"><i class="fa fa-institution"></i> City</label>
                                <input type="text" id="city" name="city" placeholder="Enter City name"
                                    value="{{ $customerInfo ? $customerInfo->city : '' }}">

                                <div class="row">
                                    <div class="col-50">
                                        <label for="state">State</label>
                                        <input type="text" id="state" name="state" placeholder="NY"
                                            value="{{ $customerInfo ? $customerInfo->state : '' }}">
                                    </div>
                                    <div class="col-50">
                                        <label for="zip">Zip</label>
                                        <input type="text" id="zip" name="zip" placeholder="10001"
                                            value="{{ $customerInfo ? $customerInfo->zip : '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-50">
                                <h3>Payment</h3>
                                <label for="">Accepted Cards</label>
                                <div class="icon-container">
                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                                </div>
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" placeholder="0181********"
                                    value="{{ $customerInfo ? $customerInfo->phone : '' }}" required>
                                <label for="address2">Address 2</label>
                                <input type="text" id="address2" name="address2" placeholder="Address line 2"
                                    value="">
                                <label for="additional_info">Additional note</label>
                                <textarea rows="5" class="form-control" id="additional_info" name="additional_info" placeholder="additional_info"
                                    value=""></textarea>
                               
                            </div>

                        </div>
                        <label>
                            <input type="checkbox" checked="checked" name="sameadr" id="sameadr"> Shipping address
                            same as
                            billing
                        </label>
                        <button type="submit" value="Continue to checkout"
                            class="btn btn-lg btn-success ld-ext-right hovering mr-4 running" id='checkoutBtn'> <i
                                id='checkoutBtnSpinner' class="fa"></i>
                            Continue to checkout</button>
                    </form>
                    <br>
                </div>
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
            //alert(unitPrice+' '+total_price+' '+quantity)

            var price = total_price - (unitPrice * quantity);

            $('#total_price').text(parseFloat(price));

            $('#rowNo_' + no).remove();
        }

        $(document).ready(function() {
            $("#checkOutInfoForm").submit(function(event) {
                event.preventDefault();

                var fname = $('#fname').val();
                var email = $('#email').val();
                var city = $('#city').val();
                var address = $('#adr').val();
                var state = $('#state').val();
                var zip = $('#zip').val();
                var phone = $('#phone').val();
                var address2 = $('#address2').val();
                var additional_info = $('#additional_info').val();
               


                var productIds = [];
                $('input[id^="productId_"]').each(function() {
                    productIds.push($(this).val())
                })
                var quantity = []
                $('td[id^="quantity_"]').each(function() {
                    quantity.push($(this).text())
                })
                var unitPrice = []
                $('input[id^="unitPrice_"]').each(function() {
                    unitPrice.push($(this).val())
                })

                data = {
                    fname: fname,
                    email: email,
                    city: city,
                    address: address,
                    state: state,
                    zip: zip,
                    phone: phone,
                    address2: address2,
                    additional_info: additional_info,
                    productIds: productIds,
                    quantity: quantity,
                    unitPrice: unitPrice,
                    _token: "{{ csrf_token() }}",
                }
                //console.log(data)

                // $('#checkoutBtnSpinner').addClass('fa-spinner fa-spin');

                // const form = document.createElement('form');
                // form.method = 'POST';
                // form.action = {{ route('cart.checkoutProducts') }};

                // Add data as hidden input fields
                // Append the data to the form dynamically
                var form = $(this);
                for (const [key, value] of Object.entries(data)) {
                    if (Array.isArray(value)) {
                        value.forEach((val, index) => {
                            form.append($('<input>', {
                                type: 'hidden',
                                name: `${key}[${index}]`,
                                value: val
                            }));
                        });
                    } else {
                        form.append($('<input>', {
                            type: 'hidden',
                            name: key,
                            value: value
                        }));
                    }
                }
                paypal.minicart.reset();
                // Change the form's action URL to the target route
                form.attr('action', "{{ route('cart.checkoutProducts') }}");
               
                // Submit the form
                form.off('submit').submit();

                // $.ajax({
                //     type: "POST",
                //     url: "{{ route('cart.checkoutProducts') }}",
                //     data: data,
                //     dataType: "json",
                //     success: function(response) {
                //         //alert(JSON.stringify(response));
                //         paypal.minicart.reset();
                //         $('#checkoutBtnSpinner').removeClass('fa-spinner fa-spin');
                //         Swal.fire({
                //             title: "Order Received",
                //             text: "Your Order Successfully placed",
                //             confirmButtonText: "Ok",
                //             icon: "success"
                //         }).then((result) => {
                //             /* Read more about isConfirmed, isDenied below */
                //             if (result.isConfirmed) {
                //                 Swal.fire("Done!", "", "success");
                //                 window.location.href = "{{ url('/') }}";
                //             } else if (result.isDenied) {
                //                 window.location.href = "{{ url('/') }}";
                //             }
                //         });

                //     },
                //     error: function(error) {
                //         alert(JSON.stringify(error));
                //     }
                // });


            });
        });
    </script>
@endsection
