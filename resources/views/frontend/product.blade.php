@extends('front-master')
@section('cssSources')
@endsection
@section('content')
    <!-- Content Header (Page header) -->

    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="col-md-4 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">

                        <ul class="slides">
                            <li
                                data-thumb="@if ($product->image) {{ asset($product->image) }}@else{{ asset('uploads/images.png') }} @endif">
                                <div class="thumb-image"> <img
                                        src="@if ($product->image) {{ asset($product->image) }}@else{{ asset('uploads/images.png') }} @endif"
                                        data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li
                                data-thumb="@if ($product->image) {{ asset($product->image) }}@else{{ asset('uploads/images.png') }} @endif">
                                <div class="thumb-image"> <img
                                        src="@if ($product->image) {{ asset($product->image) }}@else{{ asset('uploads/images.png') }} @endif"
                                        data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li
                                data-thumb="@if ($product->image) {{ asset($product->image) }}@else{{ asset('uploads/images.png') }} @endif">
                                <div class="thumb-image"> <img
                                        src="@if ($product->image) {{ asset($product->image) }}@else{{ asset('uploads/images.png') }} @endif"
                                        data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 single-right-left simpleCart_shelfItem">
                <h3>{{ $product->name }}</h3>
                <input type="hidden" id="product_id" value="{{ $product->id }}">
                <p><span class="item_price">$ {{ $product->price }}</span> </p>
                <div class="rating1">
                    <span class="starRating">
                        <input id="rating5" type="radio" name="rating" value="5" onclick="getReview(5)">
                        <label for="rating5">5</label>
                        <input id="rating4" type="radio" name="rating" value="4" onclick="getReview(4)">
                        <label for="rating4">4</label>
                        <input id="rating3" type="radio" name="rating" value="3" checked=""
                            onclick="getReview(3)">
                        <label for="rating3">3</label>
                        <input id="rating2" type="radio" name="rating" value="2" onclick="getReview(2)">
                        <label for="rating2">2</label>
                        <input id="rating1" type="radio" name="rating" value="1" onclick="getReview(1)">
                        <label for="rating1">1</label>
                    </span>
                </div>
                <form action="#" class="description" method="post">
                    {{-- <input type="text" value="Enter pincode" onfocus="this.value = '';"
                        onblur="if (this.value == '') {this.value = 'Enter pincode';}" required=""> --}}
                    <input type="button" value="Add Rating" onclick="setReview()">
                </form>
                <div class="description">
                    <h5>{{ $product->description }}</h5>

                </div>
              
                <div class="occasion-cart">
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                        <form action="#" method="post">
                            <fieldset>
                                <input type="hidden" name="cmd" value="_cart">
                                <input type="hidden" name="add" value="1">
                                <input type="hidden" name="business" value=" ">
                                <input type="hidden" name="item_name" value="{{ $product->name }}">
                                <input type="hidden" name="amount" value="650.00">
                                <input type="hidden" name="discount_amount" value="1.00">
                                <input type="hidden" name="currency_code" value="USD">
                                <input type="hidden" name="return" value=" ">
                                <input type="hidden" name="cancel_return" value=" ">
                                <input type="submit" name="submit" value="Add to cart" class="button">
                            </fieldset>
                        </form>
                    </div>

                </div>
                <ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
                    <li class="share">Share On : </li>
                    <li><a href="#" class="facebook">
                            <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                        </a></li>
                    <li><a href="#" class="twitter">
                            <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                        </a></li>
                    <li><a href="#" class="instagram">
                            <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                        </a></li>
                    <li><a href="#" class="pinterest">
                            <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                        </a></li>
                </ul>

            </div>
            <div class="clearfix"> </div>
            <!-- /new_arrivals -->
            <div class="responsive_tabs_agileits">
                <div id="horizontalTab">
                    <ul class="resp-tabs-list">
                        <li>Description</li>
                        <li>Reviews</li>
                        <li>Information</li>
                    </ul>
                    <div class="resp-tabs-container">
                        <!--/tab_one-->
                        <div class="tab1">

                            <div class="single_page_agile_its_w3ls">
                                <h6>{{ $product->name }}</h6>
                                <p>{{ $product->description }}</p>
                                <p class="w3ls_para">{{ $product->additional_info }}</p>
                            </div>
                        </div>
                        <!--//tab_one-->
                        <div class="tab2">

                            <div class="single_page_agile_its_w3ls">
                                <div class="bootstrap-tab-text-grids">
                                    <div class="bootstrap-tab-text-grid">
                                        <div class="bootstrap-tab-text-grid-left">
                                            <img src="{{asset('uploads/sample-user.webp')}}" style="width: 100px; height:100px;" alt=" " class="img-responsive">
                                        </div>
                                        <div class="bootstrap-tab-text-grid-right">
                                            <ul>
                                                <li><a href="#">Admin</a></li>
                                                <li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i>
                                                        Reply</a></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque
                                                vehicula augue eget.Ut enim ad minima veniam, quis nostrum
                                                exercitationem ullam corporis
                                                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis
                                                autem
                                                vel eum iure reprehenderit.</p>
                                        </div>
                                        
                                        <div class="clearfix"> </div>
                                    </div>
                                    
                                    <div class="add-review">
                                        <h4>add a review</h4>
                                        <form action="#" method="post">
                                            <input type="text" name="Name" required="Name">
                                            <input type="email" name="Email" required="Email">
                                            <textarea name="Message" required=""></textarea>
                                            <input type="submit" value="SEND">
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab3">

                            <div class="single_page_agile_its_w3ls">
                                <h6>Additional Information</h6>
                                <p>{{ $product->additional_info }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //new_arrivals -->
            <!--/slider_owl-->

            <x-frontend.featuredProducts />
        </div>
    </div>

    <!-- /.content -->
@endsection


@section('jsSources')
    <script>
        // Can also be used with $(document).ready()

        $(document).ready(function() {

            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };


            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });

        var review = 0;

        function getReview(i) {
            review = i
        }

        function setReview() {
            var product_id = $('#product_id').val();
    
            $.ajax({
                type: "POST",
                url: "{{ url('setReview') }}",
                data: {
                    product_id: product_id,
                    review: review,
                    _token: "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function(response) {
                    if(response.status == 'success'){
                        console.log(JSON.stringify(response));
                    }
                    console.log(JSON.stringify(response));
                },
                error: function(error) {
                    alert(JSON.stringify(error));
                }
            });
        }
    </script>
@endsection
