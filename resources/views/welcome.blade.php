@extends('layouts.app')

@section('content')
    <div class="container">
        <button id="open-cart" class="btn btn-primary">Open cart</button>
        <ul id="items-container">

        </ul>

        <input type="text" placeholder="item"/>
        <br>
        <button > set session</button>

        @if($message = !session('item'))
            <div> Something here, {{$message}}</div>
        @endif
    </div>

    <script src="{{ asset('js/openCart.js') }}" defer></script>
@endsection
