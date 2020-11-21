@extends('layouts.master')
@section('title', 'Wishlist')

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
						{{-- CHANGE: prima era $wishlist->products --}}
                        @foreach($products as $product)
							<tr>
								<td class="image" data-title="No"><a href="/products/{{ $product->id }}">
									<img style="height: 150px; width: 122px" src="{{ $product->url }}" alt="#"></td></a>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="/products/{{ $product->id }}">{{ $product->name }}</a></p>
									<p class="product-des">{{ $product->description }}</p>
								</td>
								<td class="price" data-title="Price"><span>{{ $product->price }}€ </span></td>
								
                                							
								<td class="action" data-title="Remove">
									<form action="{{ route('wishlists.products.destroy', ['wishlist' => Auth::user()->wishlist->id, 'product' => $product->id]) }}" method="POST">
										@csrf
										@method('DELETE')
										<button class="btn" style="background-color: #f7941d">
											<i class="ti-trash remove-icon"></i>
										</button>
									</form>
								</td>
							</tr>
							@endforeach 
							
						</tbody>
					</table>
					
				</div>
			</div>
			
		</div>
	</div>
	
@endsection