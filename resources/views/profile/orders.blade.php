@extends('profile.master')



@section('panel-content')

    @foreach ($orders as $order)
        
        <div class="app-order">

            <div class="card" style="height: 100%">
                <img 
                src="{{ asset('storage/box.svg') }}" 
                class="card-img-top" 
                alt=""
                style="width: 240px; height: 120px; margin: 10px auto;"
                >
                <div class="card-body">
                <h5 class="card-title">Order#: {{ $order->code }}</h5>
                <p class="card-text"> Expected day of delivery: <strong>{{ $order->expected }}</strong> </p>
                <p class="card-text"> Shipping company: <strong> Bartolini </strong></p>
                <p>Shipping address: <strong> {{ $order->address->street }} </strong> </p>
                </div>
            </div>
        </div>

    @endforeach
        

    
   
@endsection


