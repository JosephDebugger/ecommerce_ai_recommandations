@extends('front-master')

@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach ($banners as $key => $banner)
            <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach ($banners as $key => $banner)
                <div class="item slides {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ $banner->file_name }}" width="100%"  alt="Slide {{$key+1}}">
                    <div class="container">
                        <div  class="carousel-caption">
                            <h3>{{ $banner->title }}</h3>
                            <p>{{ $banner->description }}</p>
                            <a class="hvr-outline-out button2" href="{{ url('category/male/0') }}">Shop Now </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!-- The Modal -->
    </div>





    <!-- /new_arrivals -->
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info">New <span>Arrivals</span></h3>
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li> Men's</li>
                    <li> Women's</li>
                    <li> band's</li>

                </ul>
                <div class="resp-tabs-container">
                    <!--/tab_one-->
                    <div class="tab1">
                        @foreach ($products as $product)
                            @if ($product->cloth_for == 'male')
                                <div class="col-md-3 product-men">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item">
                                            <img src="@if ($product->image) {{ asset($product->image) }}@else{{ asset('uploads/images.png') }} @endif"
                                                alt="" class="pro-image-front">
                                            <img src="@if ($product->image) {{ asset($product->image) }}@else{{ asset('uploads/images.png') }} @endif"
                                                alt="" class="pro-image-back">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{ route('product', ['id' => $product->id]) }}"
                                                        class="link-product-add-cart">Quick View</a>
                                                </div>
                                            </div>
                                            <span class="product-new-top">New</span>

                                        </div>
                                        <div class="item-info-product ">
                                            <h4><a
                                                    href="{{ route('product', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                            </h4>
                                            <div class="info-product-price">
                                                <span class="item_price">{{ $product->price }} Tk</span>
                                                <del>{{ $product->discount }}</del>
                                            </div>
                                            <div
                                                class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                                            <input type="hidden" name="cmd" value="_cart" />
                                                            <input type="hidden" name="add" value="1" />
                                                            <input type="hidden" name="business"
                                                                value="example@minicartjs.com" />
                                                            <input type="hidden" name="item_name"
                                                                value="{{ $product->name }}" />
                                                            <input type="hidden" name="quantity" value="1" />
                                                            <input type="hidden" name="amount"
                                                                value="{{ $product->price }}" />
                                                            <input type="hidden" name="discount_amount"
                                                                value="{{ $product->discount }}" />
                                                            <input type="hidden" name="currency_code" value="USD" />
                                                            <input type="hidden" name="return" value=" " />
                                                            <input type="hidden" name="cancel_return" value=" " />
                                                            <input type="submit" name="submit" value="Add to cart"
                                                                class="button" />
                                                        </form>
                                                    </fieldset>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach






                        <div class="clearfix"></div>
                    </div>
                    <!--//tab_one-->
                    <!--/tab_two-->
                    <div class="tab2">


                        @foreach ($products as $product)
                            @if ($product->cloth_for == 'female')
                                <div class="col-md-3 product-men">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item">
                                            <img src="@if ($product->image) {{ asset($product->image) }}@else{{ asset('uploads/images.png') }} @endif"
                                                alt="" class="pro-image-front">
                                            <img src="@if ($product->image) {{ asset($product->image) }}@else{{ asset('uploads/images.png') }} @endif"
                                                alt="" class="pro-image-back">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{ route('product', ['id' => $product->id]) }}"
                                                        class="link-product-add-cart">Quick View</a>
                                                </div>
                                            </div>
                                            <span class="product-new-top">New</span>

                                        </div>
                                        <div class="item-info-product ">
                                            <h4><a
                                                    href="{{ route('product', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                            </h4>
                                            <div class="info-product-price">
                                                <span class="item_price">{{ $product->price }} Tk</span>
                                                <del>{{ $product->discount }}</del>
                                            </div>
                                            <div
                                                class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <form action="https://www.paypal.com/cgi-bin/webscr"
                                                            method="post">
                                                            <input type="hidden" name="cmd" value="_cart" />
                                                            <input type="hidden" name="add" value="1" />
                                                            <input type="hidden" name="business"
                                                                value="example@minicartjs.com" />
                                                            <input type="hidden" name="item_name"
                                                                value="{{ $product->name }}" />
                                                            <input type="hidden" name="quantity" value="1" />
                                                            <input type="hidden" name="amount"
                                                                value="{{ $product->price }}" />
                                                            <input type="hidden" name="discount_amount"
                                                                value="{{ $product->discount }}" />
                                                            <input type="hidden" name="currency_code" value="USD" />
                                                            <input type="hidden" name="return" value=" " />
                                                            <input type="hidden" name="cancel_return" value=" " />
                                                            <input type="submit" name="submit" value="Add to cart"
                                                                class="button" />
                                                        </form>
                                                    </fieldset>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach



                        <div class="clearfix"></div>
                    </div>
                    <!--//tab_two-->
                    <div class="tab3">


                        @foreach ($products as $product)
                        @if ($product->band_id != '')
                            <div class="col-md-3 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="@if ($product->image) {{ asset($product->image) }}@else{{ asset('uploads/images.png') }} @endif"
                                            alt="" class="pro-image-front">
                                        <img src="@if ($product->image) {{ asset($product->image) }}@else{{ asset('uploads/images.png') }} @endif"
                                            alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{ route('product', ['id' => $product->id]) }}"
                                                    class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                        <span class="product-new-top">New</span>

                                    </div>
                                    <div class="item-info-product ">
                                        <h4><a
                                                href="{{ route('product', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                        </h4>
                                        <div class="info-product-price">
                                            <span class="item_price">{{ $product->price }} Tk</span>
                                            <del>{{ $product->discount }}</del>
                                        </div>
                                        <div
                                            class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                            <form action="#" method="post">
                                                <fieldset>
                                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="business"
                                                            value="example@minicartjs.com" />
                                                        <input type="hidden" name="item_name"
                                                            value="{{ $product->name }}" />
                                                        <input type="hidden" name="quantity" value="1" />
                                                        <input type="hidden" name="amount"
                                                            value="{{ $product->price }}" />
                                                        <input type="hidden" name="discount_amount"
                                                            value="{{ $product->discount }}" />
                                                        <input type="hidden" name="currency_code" value="USD" />
                                                        <input type="hidden" name="return" value=" " />
                                                        <input type="hidden" name="cancel_return" value=" " />
                                                        <input type="submit" name="submit" value="Add to cart"
                                                            class="button" />
                                                    </form>
                                                </fieldset>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach


                        <div class="clearfix"></div>
                    </div>
                    <div class="tab4">






                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <x-frontend.trendyProducts />
            <x-frontend.featuredProducts />

            <div class="w3_agile_latest_arrivals" id="recommendations">
                <h3 class="wthree_text_info">Recommendations </h3>

            </div>


        </div>
    </div>


    <!-- //new_arrivals -->
    <!--/grids-->
    {{-- <div class="coupons">
        <div class="coupons-grids text-center">
            <div class="w3layouts_mail_grid">
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>FREE SHIPPING</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-headphones" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>24/7 SUPPORT</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>MONEY BACK GUARANTEE</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>FREE GIFT COUPONS</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div> --}}
    <!--grids-->
@endsection
@section('jsSources')
    <script>
        function loadRecommendations() {
            $.ajax({
                url: '/recommendations',
                method: 'GET',
                success: function(data) {
                    console.log(data)
                    data.recommendedProducts.forEach(element => {
                       
                        $('#recommendations').append(`
                          
                         <div class="col-md-3 product-men single">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="{{ asset('${element.image}') }}" alt="" class="pro-image-front">
                                    <img src="{{ asset('${element.image}') }}"  alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="/product/${element.id}" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="single.html">${element.name}</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price">${element.price} Tk</span>
                                    
                                    </div>
                                    <div
                                        class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                        <form action="#" method="post">
                                            <fieldset>
                                            
                                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                                    <input type="hidden" name="cmd" value="_cart" />
                                                    <input type="hidden" name="add" value="1" />
                                                    <input type="hidden" name="business" value="example@minicartjs.com" />
                                                    <input type="hidden" name="item_name" value="${element.name}" />
                                                    <input type="hidden" name="quantity" value="1" />
                                                    <input type="hidden" name="amount" value="${element.price}" />
                                                    <input type="hidden" name="discount_amount" value="${element.discount}" />
                                                    <input type="hidden" name="currency_code" value="USD" />
                                                    <input type="hidden" name="return" value=" " />
                                                    <input type="hidden" name="cancel_return" value=" " />
                                                    <input type="submit" name="submit" value="Add to cart"
                                                        class="button" />
                                                    </form>
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        `)
                    });
                    // Replace the section with new data
                }
            });
        }

        // Trigger loadRecommendations when the user interacts with a product
        loadRecommendations();
    </script>
@endsection
