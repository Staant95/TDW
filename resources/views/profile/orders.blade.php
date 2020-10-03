@extends('profile.master')



@section('panel-content')

    @for ($i = 0; $i < 5; $i++)
        
        <div class="app-order">

            <div class="card" style="height: 100%">
                <img 
                src="{{ asset('storage/box.svg') }}" 
                class="card-img-top" 
                alt=""
                style="width: 240px; height: 120px; margin: 10px auto;"
                >
                <div class="card-body">
                <h5 class="card-title">Order#: 1Af412</h5>
                <p class="card-text"> Expected day of delivery: <strong>20 October</strong> </p>
                <p class="card-text"> Shipping company: <strong> Bartolini </strong></p>

                </div>
            </div>
        </div>

    @endfor
   
@endsection


