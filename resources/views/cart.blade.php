@extends('layouts.master')

@section('content')

	@if($products->count())
		<div class="shopping-cart section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Shopping Summery -->
						<table class="table shopping-summery">
							<thead>
								<tr class="main-hading">
									<th>PRODUCT</th>
									<th>NAME</th>
									<th class="text-center">PRICE</th>
									<th class="text-center"><i class="ti-trash remove-icon"></i></th>
								</tr>
							</thead>
							<tbody>
								@foreach($products as $product)
								<tr>
									<td class="image" data-title="No"><img src="https://via.placeholder.com/100x100" alt="#"></td>
									<td class="product-des" data-title="Description">
										<p class="product-name"><a href="/products/{{ $product->id }}">{{ $product->name }}</a></p>
										<p class="product-des">{{ $product->description }}</p>
									</td>
									<td class="price" data-title="Price"><span>{{ $product->price }}€ </span></td>
									
									<td class="action" data-title="Remove">
										<form action= "{{ route('carts.products.destroy', ['cart'=>Auth::user()->cart->id,'product'=>$product->id]) }}" method="POST">
											
											@csrf
											@method('DELETE')
											<button class="btn">
												<i class="ti-trash remove-icon"></i>
											</button>
										</form> 
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<!--/ End Shopping Summery -->
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<!-- Total Amount -->
						<div class="total-amount">
							<div class="row">

								<div class="col-lg-8 col-md-5 col-12">
									<div class="left">
										<div class="coupon">
											
										</div>
									</div>
								</div>
								
									<div class="col-lg-4 col-md-7 col-12">
										<div class="right">
											<ul>
												<li>Cart Subtotal<span>{{ $total }}</span></li>
												@if($total > 100)
													<li>Shipping<span>Free</span></li>
													<li class="last">You Pay<span>{{ $total }}</span></li>									
												@else
													<li>Shipping<span>10</span></li>
													<li class="last">You Pay<span>{{ $total + 10 }}</span></li>
												@endif
											</ul>
											<div class="button5">
												<a href="/checkout" class="btn">Checkout</a>
												<a href="/" class="btn">Continue shopping</a>
											</div>
										</div>
									</div>
									
							</div>
								
						</div>

						<!--/ End Total Amount -->
					</div>
				</div>
			</div>
		</div>

	@else

		<div class="row">
			<div class="col-12" style="height: 400px; display:flex; align-items: center; justify-content:center; flex-direction: column;">
				<p style="margin-bottom: 50px">You cart is empty</p>
				<a class="btn" href="{{ route('home.index') }}" style="color: white"> 
					Buy something
				</a>
			</div>

		</div>
	@endif

@endsection