@extends('layouts.master')

@section('title', 'test')

@section('content')

<div id="productsContainer">
    <product-component></product-component>

</div>

    @include('temp-components.nav')

@endsection

