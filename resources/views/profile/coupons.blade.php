@extends('profile.master')



@section('panel-content')

<div class="app-tab-content">

    <h1 style="margin-bottom: 1em">Your coupons</h1>




    @if($coupons->count())


        @foreach ($coupons as $coupon)

            <div class="app-order" style="height: 250px!important">

                <div class="card" style="height: 100%">
                    <img
                    src="{{ asset('storage/discount.svg') }}"
                    class="card-img-top"
                    alt=""
                    style="width: 240px; height: 120px; margin: 10px auto;"
                    >

                    <div class="card-body">
                        <h5 class="card-title">Coupon code: {{ $coupon->pivot->code }}</h5>
                        <p class="card-text" style="font-size: 1.1em"> Coupon value: <strong>{{ $coupon->value }} €</strong> </p>
                    </div>

                </div>
            </div>

        @endforeach


    @else


        <h3
        style="grid-column: 1/3; grid-row: 2/3; text-align: center;"
        >
        <img src="{{ asset('storage/sad-face.svg') }}" style="height: 50px; width: 50px;"> you don't have any coupons. <br>

        @if(!$newsletterCoupon)
            <div style="margin-top: .6em;">
                <a href="/home#newsletter"
                   style="text-decoration: underline!important ; color: #f7941d;"
                > Receive a 10€ coupon now!
                </a>
            </div>

        </h3>
        @endif

    @endif

</div>

@endsection


