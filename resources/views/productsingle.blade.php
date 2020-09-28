@extends('layouts.master')

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
													<li data-thumb="https://via.placeholder.com/570x520" rel="adjustX:10, adjustY:">
														<img src="https://via.placeholder.com/570x520" alt="#">
													</li>
													<li data-thumb="https://via.placeholder.com/570x520">
														<img src="https://via.placeholder.com/570x520" alt="#">
													</li>
													<li data-thumb="https://via.placeholder.com/570x520">
														<img src="https://via.placeholder.com/570x520" alt="#">
													</li>
													<li data-thumb="https://via.placeholder.com/570x520">
														<img src="https://via.placeholder.com/570x520" alt="#">
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
												<h4>{{ $product['name'] }}</h4>
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

													
												
												<p class="price"><span class="discount">{{ $product['price'] }}€</span><s>{{ $product->shops->avg('sale') }}</s> </p>
												<p class="description">{{ $product['description'] }}</p>
											</div>
											<!--/ End Description -->
											<!-- Color -->
											<div class="color">
												<h4>Available Options <span>Color</span></h4>
												<ul>
													
													@foreach($format as $format)
												<li><a href="#" style="background-color: {{ $format->color }}"><i class="ti-check"></i></a></li>
																									
												</ul>
											</div>
											<!--/ End Color -->
											<!-- Size -->
											<div class="size">
												<h4>Size</h4>
												<ul>
													<li><a href="#" class="one">{{ $format->size }}</a></li>
													@endforeach
												</ul>
											</div>
											<!--/ End Size -->
											<!-- Product Buy -->
											<div class="product-buy">
												<div class="quantity">
													<h6>Quantity :</h6>
													<!-- Input Order -->
													<div class="input-group">
														<div class="button minus">
															<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
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
												</div>
												<div class="add-to-cart">
													<a href="#" class="btn">Add to cart</a>
													<a href="#" class="btn min"><i class="ti-heart"></i></a>
													<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
												</div>
												
												<p class="cat">Category :<a href="#">{{ $product->categories->first()->name }}</a></p>
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
													<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
													<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
												</ul>
												<!--/ End Tab Nav -->
											</div>
											<div class="tab-content" id="myTabContent">
												<!-- Description Tab -->
												<div class="tab-pane fade show active" id="description" role="tabpanel">
													<div class="tab-single">
														<div class="row">
															<div class="col-12">
																<div class="single-des">
																	<p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with deskto</p>
																</div>
																<div class="single-des">
																	<p>Suspendisse consequatur voluptates lorem nobis accumsan natus mattis. Optio pede, optio qui metus, delectus! Ultricies impedit, minus tempor fuga, quasi, pede felis commodo bibendum voluptas nisi? Voluptatem risus tempore tempora. Quaerat aspernatur? Error praesent laoreet, cras in fames hac ea, massa montes diamlorem nec quaerat, quos occaecati leo nam aliquet corporis, ab recusandae parturient, etiam fermentum, a quasi possimus commodi, mollis voluptate mauris mollis, quisque donec</p>
																</div>
																<div class="single-des">
																	<h4>Product Features:</h4>
																	<ul>
																		<li>long established fact.</li>
																		<li>has a more-or-less normal distribution. </li>
																		<li>lmany variations of passages of. </li>
																		<li>generators on the Interne.</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--/ End Description Tab -->
												<!-- Reviews Tab -->
												<div class="tab-pane fade" id="reviews" role="tabpanel">
													<div class="tab-single review-panel">
														<div class="row">
															<div class="col-12">
																<div class="ratting-main">
																	<div class="avg-ratting">
																	@php $rating = $product->reviews->avg('stars'); @endphp
																		<h4>{{ $rating }} <span>(Overall)</span></h4>
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
																		<p>Your email address will not be published. Required fields are marked</p>
																	</div>
																	<h4>Your Rating</h4>
																	<div class="review-inner">
																		<div class="ratings">
																			<ul class="rating">
																				<li><i class="fa fa-star"></i></li>
																				<li><i class="fa fa-star"></i></li>
																				<li><i class="fa fa-star"></i></li>
																				<li><i class="fa fa-star"></i></li>
																				<li><i class="fa fa-star"></i></li>
																			</ul>
																		</div>
																	</div>
																</div>
																<!--/ End Review -->
																<!-- Form -->
																<form class="form" method="post" action="mail/mail.php">
																	<div class="row">
																		<div class="col-lg-6 col-12">
																			<div class="form-group">
																				<label>Your Name<span>*</span></label>
																				<input type="text" name="name" required="required" placeholder="">
																			</div>
																		</div>
																		<div class="col-lg-6 col-12">
																			<div class="form-group">
																				<label>Your Email<span>*</span></label>
																				<input type="email" name="email" required="required" placeholder="">
																			</div>
																		</div>
																		<div class="col-lg-12 col-12">
																			<div class="form-group">
																				<label>Write a review<span>*</span></label>
																				<textarea name="message" rows="6" placeholder="" ></textarea>
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