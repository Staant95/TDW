@extends('layouts.master')

@section('title', 'Search results')

@section('content')



<section class="product-area shop-sidebar shop section" style="padding-top: 2em!important">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-12 mt-5">
				<div class="shop-sidebar">


					<div class="single-widget range">
						<h3 class="title">Shop by Price</h3>
						
						
						<form action="{{ route('filter') }}" method="post">
							@csrf

							<input type="text" name="product" value="{{ request('product') }}" hidden>


							<div class="checkbox-light">

								<div class="form-check">
									<input class="form-check-inline" type="radio" name="price-range" id="low" value="low"
									>
									<label class="checkbox-inline" for="low">
									  20$ - 50$ 
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-inline" type="radio" name="price-range" id="medium" value="medium"
									>
									<label class="checkbox-inline" for="medium">
										50$ - 100$ 
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-inline" type="radio" name="price-range" id="high" value="high"
									>
									<label class="checkbox-inline" for="high">
										100$ - 300$ 
									</label>
								</div>

								
							</div>


							<button type="submit" class="btn">Apply</button>
							

						</form>

					</div>


						<!-- Single Widget -->
						<div class="single-widget category">
							<h3 class="title">Brands</h3>
							
							<ul class="categor-list">

								@foreach ($brands as $brand)
									<li>
										<a href="#"> {{ $brand }} </a>
									</li>
								@endforeach
								
							</ul>
						</div>
						<!--/ End Single Widget -->
						
					
	
				</div>
			</div>




			<div class="col-lg-9 col-md-8 col-12">
				@if ($products->count())
				
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


				@else
					<div class="row" style="justify-content: center; align-items: center; height: 400px">
						<p style="font-size: 2.5em">No match found</p>
						
					</div>
				@endif
	
				

			</div>



		</div>
	</div>
</section>
	




@endsection