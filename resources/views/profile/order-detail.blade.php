@extends('profile.master')

@section('title', 'Order')

@section('panel-content')

<div class="container app-list-products" style="min-width: 70vw!important">
    <div class="row" style="margin-top: 0.7em">


        <div class="col-12">

            <table class="table shopping-summery">
                <thead>
                    <tr class="main-hading">
                        <th style="text-align: left">PRODUCT</th>
                        <th style="text-align: left; padding-left: 0px;">NAME</th>
                        <th class="text-center app-unit-price">UNIT PRICE</th>
                        <th class="text-center">QUANTITY</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                    <tr>
                        <td class="image" data-title="No" style="width: 120px; padding-right: 0px!important;">
                            <img src="https://via.placeholder.com/100x100" alt="#">
                        </td>
                        <td class="product-des" data-title="Description" style="max-width: 100px; padding-left: 0px;">
                            <p class="product-name"><a href="/products/{{ $product->id }}">{{ $product->name }}</a></p>
                            <p class="product-des">{{ Str::limit($product->description, 30, '...') }}</p>
                        </td>
                        <td class="price app-unit-price" data-title="Price"><span>{{ $product->price }}€ </span></td>
                        
                        <td class="qty" data-title="Qty">
                            <div class="input-group">        
                                <p style="width: 100%; text-align: center">{{ $product->pivot->quantity }}</p>                             
                            </div>
                        </td>
        
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
   

    <div class="row">
        <div class="col-12" style="display: flex; justify-content: end;">
            <h5>
               Total: {{ $order->total }}€
            </h5>
        </div>
    </div>

</div>

@endsection