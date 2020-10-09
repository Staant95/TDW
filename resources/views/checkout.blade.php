@extends('layouts.master')

@section('title', 'Checkout')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul style="display: flex; justify-content: center;align-items: center; flex-direction: column">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<section class="shop checkout section">
    <div class="container">

        <form class="row" action="{{ route('checkout.store', ['total' => $finalPrice]) }}" method="post">
            @csrf
                <div class="col-lg-8 col-12">
                    <div>
                        <h5 class="app-heading">Choose your shipping address</h5>

                        <div class="app-address-container">

                            <h5>Your addresses</h5>
                            <hr>
                            @foreach ($addresses as $address)
                                
                                <div class="app-address">
                                    <input type="radio" name="address" id="{{ $address->id }}" value="{{ $address->id }}">
                                    <label for="{{ $address->id }}" class="address">
                                        <p> {{ $address->street }}, {{ $address->city }}, {{ $address->zip }}</p>
                                    </label>
                               
                                </div>
                            @endforeach
        
        
                
                            <div class="app-address">
                                <span>
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </span>
                                <a href="{{ route('profile.addresses.create', ['redirect' => 'checkout']) }}"> Add address </a>
                            </div>

                        </div>



                        <h5 class="app-heading">Choose your payment method</h5>

                        <div class="app-address-container">

                            <h5>Your payments</h5>
                            <hr>


                            @foreach ($payments as $payment)
                                
                                <div class="app-address">
                                    <input type="radio" name="payment" id="{{ $payment->id }}">
                                    <label for="{{ $payment->id }}" class="app-payment-method">
                                        <p>{{ $payment->type }} starting with {{ Str::substr($payment->pivot->card_number, 0, 4) }}</p>
                                        <p class="app-card-owner">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
                                        <p class="app-expiration"> {{ $payment->pivot->expiration_date }} </p>
                                    </label>                             
                                </div>

                            @endforeach

  

                            <div class="app-address">

                                <span>
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </span>
                                <a href="{{ route('profile.payments.create', ['redirect' => 'checkout']) }}"> Add payment method </a>
                            </div>


                        </div>

                        
                    </div>
                </div>


                
                <div class="col-lg-4 col-12">
                    <div class="order-details">
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>CART TOTALS</h2>
                            <div class="content">
                                <ul>
                                    <li>Sub Total<span>{{ $total }}€</span></li>
                                   
                                    <li>(+) Shipping<span> {{ $shippingCost }}€</span></li>
                                    @if ($coupon)
                                        <li> (-) Coupon: <span> {{ $coupon->value }}€ </span> </li>
                                    @endif
                                    <li class="last">Total<span>{{ $finalPrice + $shippingCost }}€</span></li>
                                </ul>
                            </div>
                        </div>
                        <!--/ End Order Widget -->
        
                        <!-- Payment Method Widget -->
                        <div class="single-widget payement">
                            <div class="content">
                                <img src="../../images/payment-method.png" alt="#">
                            </div>
                        </div>
                        <!--/ End Payment Method Widget -->
                        <!-- Button Widget -->
                        <div class="single-widget get-button">
                            <div class="content">
                                <div class="button">      

                                    <button class="btn" type="submit">PAY</button>
                                    
                                </div>
                            </div>
                        </div>
                        <!--/ End Button Widget -->
                    </div>
                </div>
        </form>

     
        <div class="row mt-4">
            <div class="col-lg-8 col-md-5 col-12">
                <div class="left">
                    <div class="coupon">
                        <form action="{{ route('checkout.index') }}" method="get">
                            <input required name="coupon" placeholder="Enter Your Coupon">
                            <button class="btn">Apply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>


</section>
<!--/ End Checkout -->
@endsection