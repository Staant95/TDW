@extends('layouts.master')

@include('temp-components.nav')

@section('title', 'Homepage')

@section('content')

    @include('homepage.hero')
    @include('homepage.banner')
    @include('homepage.product')
    @include('homepage.mediumBanner')
{{--    @include('homepage.popularProducts')--}}
    @include('homepage.saleProducts')
    @include('homepage.shopService')
    @include('homepage.newsletter')

{{--    <div id="productsContainer">--}}
{{--        <product-component></product-component>--}}
{{--    </div>--}}

@endsection

