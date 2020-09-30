@extends('layouts.master')

@section('content')

<!-- Shopping Cart -->
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
                        @foreach($wishlist->products as $product)
							<tr>
								<td class="image" data-title="No"><a href="/products/{{ $product->id }}"><img src="https://via.placeholder.com/100x100" alt="#"></td></a>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="/products/{{ $product->id }}">{{ $product->name }}</a></p>
									<p class="product-des">{{ $product->description }}</p>
								</td>
								<td class="price" data-title="Price"><span>{{ $product->price }}€ </span></td>
								
                                							
								TODO:<td class="action" data-title="Remove"><a href="/removewishlist/{{ $product->id }}">@csrf
									<i class="ti-trash remove-icon"></i></a></td>
							</tr>
							@endforeach 
							
						</tbody>
					</table>
					
				</div>
			</div>
			
		</div>
	</div>
	
@endsection