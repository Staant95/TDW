@extends('layouts.master')

@section('title', 'Checkout')

@section('content')

<!-- Start Checkout -->
<section class="shop checkout section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div>
                    <h5 class="app-heading">Choose your shipping address</h5>

                    <div class="app-address-container">

                        <h5>Your addresses</h5>
                        <hr>

                        <div class="app-address">
                            <input type="radio" name="address" id="address1">
                            <label for="address1" class="address">
                                <p>Viale T. Morroni, 38, Rieti, 02100</p>
                                
                            </label>
                        </div>
    
    
                        <div class="app-address">
                            <input type="radio" name="address" id="address1">
                            <label for="address1" class="address">
                                <p>Via Vazia, 3, Rieti, 02100</p>
                                
                            </label>
                        </div>

                        <div class="app-address">
                            <span>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </span>
                            <a href=""> Add address </a>
                        </div>

                    </div>



                    <h5 class="app-heading">Choose your payment method</h5>

                    <div class="app-address-container">

                        <h5>Your payments</h5>
                        <hr>

                        <div class="app-address">
                            <input type="radio" name="payment" id="payment1">
                            <label for="payment1" class="app-payment-method">
                                <p>Visa ending with 5969</p>
                                <p class="app-card-owner">Stanislav Antokhi</p>
                                <p class="app-expiration">03/2023</p>
                            </label>
                        </div>
    
    
                        <div class="app-address">
                            <input type="radio" name="payment" id="payment2">
                            <label for="payment2" class="app-payment-method">
                                <p>Master Card ending with 5969</p>
                                <p class="app-card-owner">Stanislav Antokhi</p>
                                <p class="app-expiration">03/2026</p>
                            </label>
                        </div>

                        <div class="app-address">

                            <span>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </span>
                            <a href=""> Add payment method </a>
                        </div>


                    </div>

                    
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>CART  TOTALS</h2>
                        <div class="content">
                            <ul>
                                <li>Sub Total<span>{{ $total }}€</span></li>
                                <li>(+) Shipping<span>0.00€</span></li>
                                <li class="last">Total<span>{{ $total }}€</span></li>
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
                                <form action="{{ route('checkout.store') }}" method="post">
                                    @csrf
                                    <button class="btn">PAY</button>
                                    
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <!--/ End Button Widget -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Checkout -->
@endsection