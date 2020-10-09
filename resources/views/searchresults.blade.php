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
				
					<div class="row" id="singleProduct">
					

						@foreach ($products as $product)
							<single-product
								wishlist-id={{ Auth::user()->wishlist->id }}
								:product="{{ $product }}"
								image={{ $product->images->first()->URL }}
								
							>
							</single-product>
					
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