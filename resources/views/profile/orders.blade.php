@extends('profile.master')



@section('panel-content')

<div class="app-tab-content">

    @if ($orders->count())

      
        

            {{-- <form name="order" action="{{ route('profile.orders.show', ['order' => $order->id]) }}" method="GET">
            
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

            </form> --}}

            <h3 style="margin-bottom: 0.3em;">Your orders</h3>
            <div style="display: flex; width: 100%">
                <form class="form-inline" style="width: 70%;">
                    <select class="custom-select mr-sm-2" id="order-list-filter">
                        <option selected value="6">Last 6 months</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                    </select>
                </form>
                <div id="app-return-order">
                    <a href="">Return order</a>
                </div>
            </div>
               

            <h2 style="margin-top: 1.5em; font-family: Tiempos; font-weight: 500; font-size; 2em">This month</h2>
            <hr>

            

            @foreach ($orders as $order)

                <div class="app-order-header">
                    <h3 style="font-weight: 600; font-size: 1.75rem; letter-spacing: -0.28px"
                    >Order number: {{ $order->code }}</h3>

                    <div class="app-order-header-info">
                        <div>
                            <div>
                                Order date
                            </div>
                            <div>
                                lu, 17.11.2020
                            </div>
                        </div>
                        
                        <div>
                            <div>Total</div>
                            <div>{{ $order->total }}€</div>
                        </div>

                        <div>
                            <div>Payment status</div>
                            <div>Paid</div>
                        </div>

                    </div>


                    <div class="app-order-body">

                        @foreach ($order->products as $product)
                            
                           <div class="app-order-card">

                                <div class="app-order-card-img">
                                    <img src="https://img01.ztat.net/article/spp-media-p1/18bd47d37fb13d73b43f2743d9e071c1/298019c559474709bc5690da2bb4c31e.jpg?imwidth=169&filter=packshot" alt="product img">
                                </div>
                                <h5 style="margin-top: 0.5em">
                                    {{ $product->name }}
                                </h5>
                                <p>
                                   Size: {{ $product->formats()->first()->size }}
                                </p>

                           </div>

                        @endforeach

                    </div>

                </div>


            @endforeach

            

        

    @else

        <div style="width: 100%">
        
            <h2>Your orders</h2>

            <p id="app-icon">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </p>

            <h4 style="text-align:center; font-size: 1.5rem">
                You have never placed an order. How about you try?
            </h4>
            
            <div style="text-align: center; margin-top: 4em">

                <a class="app-shop-btn"
                href="{{ route('home.index') }}">
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    Continue shopping
                </a>

            </div>
        </div>  

    @endif
    
</div>

        

    
   
@endsection


