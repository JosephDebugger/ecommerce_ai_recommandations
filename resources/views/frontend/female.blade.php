
@extends('front-master')

@section('content')


<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->
		<div class="col-md-4 products-left">
			{{-- <div class="filter-price">
				<h3>Filter By <span>Price</span></h3>
					<ul class="dropdown-menu6">
						<li>                
							<div id="slider-range"></div>							
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>			
					</ul>
			</div> --}}
			
			<x-frontend.categoryList type="female"/>


			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
		
			<div class="sort-grid">
				<div class="sorting">
					<h6>Sort By</h6>
					<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">Default</option>
						<option value="null">Name(A - Z)</option> 
						<option value="null">Name(Z - A)</option>
						<option value="null">Price(High - Low)</option>
						<option value="null">Price(Low - High)</option>	
						<option value="null">Model(A - Z)</option>
						<option value="null">Model(Z - A)</option>					
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="sorting">
					<h6>Showing</h6>
					<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">7</option>
						<option value="null">14</option> 
						<option value="null">28</option>					
						<option value="null">35</option>								
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		
	
			@foreach ($products as $product)
                   
			<div class="col-md-4 product-men">
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
						<h4><a href="{{ route('product', ['id' => $product->id]) }}">
							@if (str_word_count($product->name) > 5)
								{{ implode(' ', array_slice(explode(' ', $product->name), 0, 5)) }}...
							@else
								{{ $product->name }}
							@endif
						</a>
					</h4>
						<div class="info-product-price">
							<span class="item_price">{{ $product->price - $product->discount }} Tk</span>
							<del>{{ $product->price }}</del>
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
	
	{{ $products->links() }}
				
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		
		
	</div>
</div>	

@endsection

@section('scripts')
<script>

</script>

@endsection
