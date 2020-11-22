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
													20€ - 50€ 
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-inline app-radio" type="radio" name="price" id="medium" value="medium"
												{{ old('price') == 'medium' ? 'checked' : '' }}
												>
												<label class="checkbox-inline" for="medium">
													50€ - 100€ 
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-inline app-radio" type="radio" name="price" id="high" value="high"
												{{ old('price') == 'high' ? 'checked' : '' }}
												>
												<label class="checkbox-inline" for="high">
													100€ - 500€ 
												</label>
											</div>

											
										</div>
									
										
							

						</div>

						<div class="single-widget category">
						<h3>Brands</h3>
							<div class="container-filters">
							
								<label id="showMore" for="show-more-brands">Show more</label>
								<input id="show-more-brands" type="checkbox" style="display: none;">
								<ul class="list brand-list">
								
									@foreach ($brands as $brand)
								

									<li class="list-items">										
				
										<input class="app-checkbox" type="checkbox" value="{{ $brand }}" id="{{ $brand }}" name="brand"
										{{ old($brand) == $brand ? 'checked' : '' }}
									>
										<label for="{{ $brand }}"> {{ $brand }}</label>
									
									</li>
							
									@endforeach
								
								</ul>
					
							</div>
						</div>

						
						<div class="single-widget category">
							<h3>Colors</h3>
								<div class="container-filters">
								
									<label id="showMore" for="show-more-colors">Show more</label>
									<input id="show-more-colors" type="checkbox" style="display: none;">
									<ul class="list color-list">
									
										@foreach ($colours as $colour)
									
	
										<li class="list-items">										
					
											<input class="app-checkbox" type="checkbox" value="{{ $colour }}" id="{{ $colour }}" name="colour"
											{{ old($colour) === $colour ? 'checked' : '' }}
										>
											<label for="{{ $colour }}"> {{ $colour }}</label>
										
										</li>
								
										@endforeach
									
									</ul>
						
								</div>
							</div>

							<div class="single-widget category">
								<h3>Sizes</h3>
									<div class="container-filters">
									
										<label id="showMore" for="show-more-sizes">Show more</label>
										<input id="show-more-sizes" type="checkbox" style="display: none;">
										<ul class="list size-list">
										
											@foreach ($sizes as $size)
										
		
											<li class="list-items">										
						
												<input class="app-checkbox" type="checkbox" value="{{ $size }}" id="{{ $size }}" name="size"
												{{ old($size) == $size ? 'checked' : '' }}
											>
												<label for="{{ $size }}"> {{ $size }}</label>
											
											</li>
									
											@endforeach
											
										</ul>
							
									</div>
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
							{{-- <single-product
								wishlist-id={{ Auth::user()->wishlist->id }}
								:product="{{ $product }}"
								image={{ $product->url }}
								
							>
							</single-product> --}}
							<product-card
                        wishlist-id={{ Auth::user()->wishlist->id }}
                        :product="{{ $product }} "
                        image={{ $product->getFirstMediaUrl() }}
                    >

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

<script> $(".show-more a").on("click", function() {
    var $this = $(this); 
    var $content = $this.parent().prev("div.content");
    var linkText = $this.text().toUpperCase();    

    if(linkText === "SHOW MORE"){
        linkText = "Show less";
        $content.switchClass("hideContent", "showContent", 400);
    } else {
        linkText = "Show more";
        $content.switchClass("showContent", "hideContent", 400);
    };

    $this.text(linkText);
});​</script>





@endsection