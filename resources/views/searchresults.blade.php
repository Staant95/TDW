@extends('layouts.master')

@section('title', 'Search results')

@section('content')



<section class="product-area shop-sidebar shop section" style="padding-top: 2em!important">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-12" style="margin-top: 1.5em!important">
				<div class="shop-sidebar ">

					
					<form action="{{ route('filter', ['product' => request('product')]) }}" method="post" id="filter">
						@csrf
						<div class="single-widget range">
							

								<input type="text" name="product" value="{{ request('product') }}" hidden>

								<h3 class="title">Shop by Price</h3>
			
						
										<div class="checkbox-light">

											<div class="form-check">
												<input class="form-check-inline app-radio" type="radio" name="price" id="low" 
												value="low"
												{{ old('price') == 'low' ? 'checked' : '' }}
												onclick="!this.input.checked"
												>
												<label class="checkbox-inline" for="low">
													20$ - 50$ 
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-inline app-radio" type="radio" name="price" id="medium" value="medium"
												{{ old('price') == 'medium' ? 'checked' : '' }}
												>
												<label class="checkbox-inline" for="medium">
													50$ - 100$ 
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-inline app-radio" type="radio" name="price" id="high" value="high"
												{{ old('price') == 'high' ? 'checked' : '' }}
												>
												<label class="checkbox-inline" for="high">
													100$ - 500$ 
												</label>
											</div>

											
										</div>
									
										
							

						</div>


							<!-- Single Widget -->
						<div class="single-widget category">
							<h3 class="title">Brands</h3>

							

							<ul class="categor-list">

								
								@foreach ($brands as $brand)
								

										<li>										
						
											<input class="app-checkbox" type="checkbox" value="{{ $brand }}" id="{{ $brand }}" name="{{ $brand }}"
											{{ old($brand) == $brand ? 'checked' : '' }}
											>
											<label for="{{ $brand }}"> {{ $brand }}</label>
											
										</li>
									
								@endforeach
								
								
								
							</ul>
						</div>
						<!--/ End Single Widget -->
						
						<div class="single-widget" style="display: flex; justify-content: center">
							<button class="btn">Apply</button>
							<button  id="reset-btn" class="btn">Reset</button>
						</div>
					</form>
				</div>
			</div>
			
			<script>
				const btn = document.querySelector('#reset-btn');
				const form = document.querySelector('#filter');
				btn.addEventListener('click', function(event) {
					
					const radio = document.querySelectorAll('.app-radio')
					const checkboxes = document.querySelectorAll('.app-checkbox')

					radio.forEach(el => el.checked = false);
					checkboxes.forEach(el => el.checked = false);
					form.submit();
				})
			</script>



			<div class="col-lg-9 col-md-8 col-12">
				@if ($products->count())
				
					<div class="row" id="productCard">

						@foreach ($products as $product)
							
							{{-- <div class="col-lg-4 col-md-6 col-12" >

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

							</div> --}}
						
							<product-card :product="{{ $product }}" >
							</product-card>
					
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