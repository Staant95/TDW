@extends('layouts.master')

@section('title', 'Search results')

@section('content')



<section class="product-area shop-sidebar shop section" style="padding-top: 2em!important">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-12 mt-5">
				<div class="shop-sidebar">
						<!-- Single Widget -->
						<div class="single-widget category">
							<h3 class="title">Categories</h3>
							<ul class="categor-list">
								<li><a href="#">T-shirts</a></li>
								<li><a href="#">jacket</a></li>
								<li><a href="#">jeans</a></li>
								<li><a href="#">sweatshirts</a></li>
								<li><a href="#">trousers</a></li>
								<li><a href="#">kitwears</a></li>
								<li><a href="#">accessories</a></li>
							</ul>
						</div>
						<!--/ End Single Widget -->
						<!-- Shop By Price -->
							<div class="single-widget range">
								<h3 class="title">Shop by Price</h3>
								<div class="price-filter">
									<div class="price-filter-inner">
										<div id="slider-range"></div>
											<div class="price_slider_amount">
											<div class="label-input">
												<span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price"/>
											</div>
										</div>
									</div>
								</div>
								<ul class="check-box-list">
									<li>
										<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
									</li>
									<li>
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
									</li>
									<li>
										<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
									</li>
								</ul>
							</div>
							<!--/ End Shop By Price -->
					
	
				</div>
			</div>
			<div class="col-lg-9 col-md-8 col-12">
	
				<div class="row">

					@foreach ($products as $product)
						
						<div class="col-lg-4 col-md-6 col-12" >

							<div class="single-product app-product">
								<div class="product-img">
									<a href="product-details.html">
										<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
										<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
									</a>
									<div class="button-head">
										<div class="product-action">
											<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										</div>
										<div class="product-action-2">
											<a title="Add to cart" href="#">Add to cart</a>
										</div>
									</div>
								</div>
								<div class="product-content">
									<h3><a href="product-details.html">{{ $product->name }}</a></h3>
									<div class="product-price">
										<span> {{ $product->price }}</span>
									</div>
								</div>
							</div>

						</div>
					@endforeach					
	
				</div>

			</div>
		</div>
	</div>
</section>
	




@endsection