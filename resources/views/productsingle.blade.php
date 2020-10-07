@extends('layouts.master')

@section('title', 'Product')

@section('content')
<!-- Shop Single -->
	<section class="shop single section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-lg-6 col-12">
							<!-- Product Slider -->
							<div class="product-gallery">
								<!-- Images slider -->
								<div class="flexslider-thumbnails">
									<ul class="slides">
										{{-- <li data-thumb="https://via.placeholder.com/570x520" rel="adjustX:10, adjustY:"> --}}
											<img src="{{ asset($product->images->get(1)->URL) }}" alt="#">
										</li>
									</ul>
								</div>
								<!-- End Images slider -->
							</div>
							<!-- End Product slider -->
						</div>
						<div class="col-lg-6 col-12">
							<div class="product-des">
								<!-- Description -->
								<div class="short">
									<h4>{{ $product->name }}</h4>

									<div class="rating-main">

										<ul class="rating">										

											@foreach(range(1,5) as $i)
												<span class="fa-stack" style="width:1em">
												<i class="far fa-star fa-stack-1x"></i>

													@if($rating >0)
														@if($rating >0.5)
														<i class="fas fa-star fa-stack-1x"></i>
														@else
														<i class="fas fa-star-half fa-stack-1x"></i>
														@endif
													@endif

												@php $rating--; @endphp
												</span>
											@endforeach
											
										</ul>

										<a href="#" class="total-review">({{ $product->reviews->count() }})</a>
									</div>

										
									
									<p class="price">
										<span class="discount">{{ $product['price'] }}€</span>
										<s></s> 
									</p>
									<p class="description">{{ $product['description'] }}</p>

								</div>


								<div class="color">
									<h4>Available Options <span>Color</span></h4>
									<ul>										
										@foreach($formats as $format)
										<li>
											<a href="#" style="background-color: {{ $format->color }}"><i class="ti-check"></i>
											</a>
										</li>
																						
										@endforeach
									</ul>
								</div>


								<div class="size">
									<h4>Size</h4>

									<label class="mr-sm-2 sr-only" for="sizes">Sizes</label>
									<select class="custom-select mr-sm-2" id="sizes">
										@foreach ($formats as $format)
											<option value="{{ $format->size }}"> {{ $format->size }}</option>
										@endforeach
										
									</select>

								</div>
								
								
								<!--/ End Color -->
						
								<!-- Size -->
								<!--/ End Size -->
								<!-- Product Buy -->
								<div class="product-buy">

									{{-- <div class="quantity">
										<h6>Quantity :</h6>
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div> --}}


									<div class="add-to-cart app-add-to-cart">
										<form action="{{ route('carts.products.store', ['cart' => Auth::user()->cart->id]) }}" method="post">
											@csrf
											<input type="text" hidden name="product" value="{{ $product->id }}">
											<button type="submit" class="btn btn-primary">Add to cart</button>
										</form>
											


										<form action="{{ route('wishlists.products.store', ['wishlist' => Auth::user()->wishlist->id]) }}" method="post">
											@csrf
											<input type="text" hidden name="product" value="{{ $product->id }}">
											<button type="submit" class="btn min"><i class="ti-heart"></i></button>

										
										</form>
										
									</div>
									
									<p class="cat">Category :
										<a href="#">{{ $product->categories->first()->name }}</a>
									</p>
								</div>
								<!--/ End Product Buy -->
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="product-info">
								<div class="nav-main">
									<!-- Tab Nav -->
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
									</ul>
									<!--/ End Tab Nav -->
								</div>
								<div class="tab-content" id="myTabContent">
									<!-- Reviews Tab -->
									<div class="tab-pane fade show active" id="reviews" role="tabpanel">
										<div class="tab-single review-panel">
											<div class="row">
												<div class="col-12">
													<div class="ratting-main">
														<div class="avg-ratting">
														
															<h4>{{ $product->reviews->avg('stars') }} <span>(Overall)</span></h4>
															<span>Based on {{ $product->reviews->count() }} Comments</span>

														</div>
														<!-- Single Rating -->
														
														@foreach($review as $review) 																	
														<div class="single-rating">
															<div class="rating-author">
																<img src="https://via.placeholder.com/200x200" alt="#">
															</div>
															<div class="rating-des">
																<h6>{{ $review->user->name }}</h6>
																<div class="ratings">
																	<ul class="rating">
																	@php $singlerating = $review->stars; @endphp  

																		@foreach(range(1,5) as $i)
																			<span class="fa-stack" style="width:1em">
																				<i class="far fa-star fa-stack-1x"></i>

																					@if($singlerating >0)
																						@if($singlerating >0.5)
																						<i class="fas fa-star fa-stack-1x"></i>
																						@else
																						<i class="fas fa-star-half fa-stack-1x"></i>
																						@endif
																					@endif
																		@php $singlerating--; @endphp
																		</span>
																		@endforeach
																	</ul>
																	<div class="rate-count">(<span>{{ $review->stars }}</span>)</div>
																</div>
																
																<p>{{ $review->description }}</p>
															</div>
														</div>
														@endforeach
														<!--/ End Single Rating -->
														
													</div>
													<!-- Review -->
													<div class="comment-review">
														<div class="add-review">
															<h5>Add A Review</h5>
															
														</div>
														



													</div>
													<!--/ End Review -->
													<!-- Form -->
													<form method="post" action="{{ route('review.store') }}">
														@csrf




														<h4>Your Rating</h4>

														<div class="review-inner">
															<div class="stars">																
																  <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
																  <label class="star star-5" for="star-5"></label>
																  <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
																  <label class="star star-4" for="star-4"></label>
																  <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
																  <label class="star star-3" for="star-3"></label>
																  <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
																  <label class="star star-2" for="star-2"></label>
																  <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
																  <label class="star star-1" for="star-1"></label>
															  </div>
														</div>


														<div class="row">
											
															<div class="col-lg-12 col-12">
																<div class="form-group">
																	<label>Write a review</label>
																	<input name="product_id" value="{{ $product->id }}" hidden>
																	<input name="user_id" value="{{ Auth::user()->id }}" hidden>
																	<textarea name="description" rows="6" ></textarea>
																</div>
															</div>
															<div class="col-lg-12 col-12">
																<div class="form-group button5">
																	<button type="submit" class="btn">Submit</button>
																</div>
															</div>
														</div>
													</form>
													<!--/ End Form -->
												</div>
											</div>
										</div>
									</div>
									<!--/ End Reviews Tab -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		<!--/ End Shop Single -->
@endsection