@extends('profile.master')



@section('panel-content')

<div class="app-tab-content">

    @if ($orders->count())

      
        @foreach ($orders as $order)

            <form name="order" action="{{ route('profile.orders.show', ['order' => $order->id]) }}" method="GET">
            
                <div class="app-order" onclick="document.order.submit()">

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

            </form>

        @endforeach

    @else
        
        <p style="grid-column: 1/4; grid-row: 2/3; font-size: 3em;">Take a look at 
            <a 
            href="{{ route('category.index', ['category' => 9]) }}"
            id="app-link"
            >
                Today's deals
            </a>  
        </p>  

    @endif
    
</div>

        

    
   
@endsection


