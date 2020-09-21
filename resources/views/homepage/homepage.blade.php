@extends('layouts.master')

@section('title', 'Homepage')

@section('content')

    <div id="productsContainer">
        <product-component></product-component>
    </div>

    @include('temp-components.nav')

@endsection

