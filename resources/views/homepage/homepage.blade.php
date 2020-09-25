@extends('layouts.master')

@include('temp-components.nav')

@section('title', 'Homepage')

@section('content')

    @include('homepage.components.hero')
    @include('homepage.components.banner')
{{--    @include('homepage.components.product')--}}
    <div id="trendingListContainer">
        <trending-products-list></trending-products-list>
    </div>
    @include('homepage.components.mediumBanner')
{{--    @include('homepage.popularProducts')--}}
    @include('homepage.components.saleProducts')
    @include('homepage.components.shopService')
    @include('homepage.components.newsletter')

{{--    <div id="productsContainer">--}}
{{--        <product-component></product-component>--}}
{{--    </div>--}}

@endsection

