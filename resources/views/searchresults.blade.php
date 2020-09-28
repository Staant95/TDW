@extends('layouts.master')

@section('content')
<!-- Product Style 1 -->
<section class="product-area shop-sidebar shop-list shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								

								<!-- Single Widget -->
								<div class="single-widget recent-post">
									<h3 class="title">Recent post</h3>
                                    <!-- Single Post -->
                                    
                                    @foreach($random as $random)
                                    
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="/products/{{ $random->id }}">{{ $random->name }}</a></h5>
											<p class="price">{{ $random->price }}€</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
                                    </div>
                                    @endforeach
									<!-- End Single Post -->
									
								</div>
								<!--/ End Single Widget -->
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Manufacturers</h3>
									<ul class="categor-list">
										<li><a href="#">Forever</a></li>
										<li><a href="#">giordano</a></li>
										<li><a href="#">abercrombie</a></li>
										<li><a href="#">ecko united</a></li>
										<li><a href="#">zara</a></li>
									</ul>
								</div>
								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Show :</label>
											<select>
												<option selected="selected">09</option>
												<option>15</option>
												<option>25</option>
												<option>30</option>
											</select>
										</div>
										<div class="single-shorter">
											<label>Sort By :</label>
											<select>
												<option selected="selected">Name</option>
												<option>Price</option>
												<option>Size</option>
											</select>
										</div>
									</div>
									<ul class="view-mode">
										<li><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
										<li class="active"><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
									</ul>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
                                <!-- Start Single List -->
                                @foreach($searched as $searched)
								<div class="col-12">
									<div class="row">
										<div class="col-lg-4 col-md-6 col-sm-6">
											<div class="single-product">
												<div class="product-img">
													<a href="/products/{{ $searched->id }}">
														<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
														<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
													</a>
													<div class="button-head">
														<div class="product-action">
															<form action"/favorites" method="post">
                                                            <input name="product_id" value="{{ $searched->id }}" hidden>
                                                            <button type="submit" title="Wishlist" class="btn min"><i class=" ti-heart "></i><span></span></button>
                                                            </form>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <form action"/cart" method="post">
                                                            <input name="product_id" value="{{ $searched->id }}" hidden>
                                                            <button type="submit" class="btn btn-primary">Add to cart</button>
                                                        </form>
														</div>
                                                    </div>
												</div>
											</div>
										</div>
										<div class="col-lg-8 col-md-6 col-12">
											<div class="list-content">
												<div class="product-content">
													<div class="product-price">
														<span>{{ $searched['price'] }}€</span>
													</div>
													<h3 class="title"><a href="/products/{{ $searched->id }}">{{ $searched['name'] }}</a></h3>
													<div class="review-inner">
														<div class="ratings">
															<ul class="rating">
                                                            @php $rating = $searched->reviews->avg('stars'); @endphp
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
																<li class="total">({{ $searched->reviews->avg('stars') }})</li>
															</ul>
														</div>
													</div>
												</div>
												<p class="des">{{ $searched['description'] }}</p>
												<a href="/products/{{ $searched->id }}" class="btn">Watch Now!</a>
											</div>
										</div>
									</div>
                                </div>
                                @endforeach
								<!-- End Single List -->
								
									
								</div>
							</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->
@endsection