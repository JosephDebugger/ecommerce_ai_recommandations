@extends('front-master')

@section('content')
    

    <!-- /new_arrivals -->
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info">Bands <span>Item</span></h3>
            <div id="horizontalTab">
                
               
                    <!--/tab_one-->
                
                        @foreach ($products as $product)

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
                          
                        @endforeach






                        
                    
                    <!--//tab_one-->
                    <!--/tab_two-->
          
                    <!--//tab_two-->
                 
               
            </div>
            


        </div>
    </div>
    


@endsection
@section('jsSources')
    <script>
     
    </script>
@endsection
