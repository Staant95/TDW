@extends('layouts.master')


@section('title', 'Homepage')

@section('content')

    @if (session('subscription'))
        <div class="alert alert-success subscriptionAlert"
             style="position: absolute; z-index: 100; top: 10%; left:50%; width: 50%; transform:translate(-50%, -50%); text-align: center">
            {{ session('subscription') }}
        </div>
    @endif

    @include('homepage.components.hero')
    @include('homepage.components.banner')
{{--    @include('homepage.components.product')--}}
    <div id="trendingListContainer">
        <trending-products-list wishlist-id={{ Auth::user()->wishlist->id }}></trending-products-list>
    </div>
    @include('homepage.components.mediumBanner')
{{--    @include('homepage.popularProducts')--}}
    @include('homepage.components.saleProducts')

    @include('homepage.components.shopService')
    @include('homepage.components.newsletter')

{{--    <div id="productsContainer">--}}
{{--        <product-component></product-component>--}}
{{--    </div>--}}
<script>
    if(document.querySelector('.subscriptionAlert')) {
        const subscriptionAlert = document.querySelector('.subscriptionAlert');
        setTimeout(() => subscriptionAlert.remove(), 1500);
    }
</script>
@endsection

