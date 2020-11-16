@extends('profile.master')

@section('panel-content')

<div class="app-tab-content">

    <h1>Your payment methods</h1>
    <p style="font-size: 1.2em; color: black; margin-bottom: 2em">
        Add a payment method to speed up checkout process.
    </p>

    <div style="display: flex">

        <div class="card app-payment" style="height: 100%">
            <a id="app-add-payment" href="{{ route('profile.payments.create') }}">
                <i style="color: #f7941d;" class="fa fa-plus" aria-hidden="true"></i>
                <p style="color: #f7941d;">Add payment method</p> 
            </a>
        </div>


        @foreach ($payments as $payment)
            
            <div class="card app-payment" style="height: 100%">
                <div class="card-body app-card-content">
                    
                    <h5 class="card-title">{{ $payment->type }}</h5>
                    
                    <h2 style="font-weight: 500; color: black" class="card-text"> {{ Auth::user()->name }}  {{ Auth::user()->lastname }}</h2>
                    <div>
                        <p style="font-weight: 500; color: black; font-size: 1.1em" class="card-text"> 
                           Card number: <strong>{{ $payment->pivot->card_number }} </strong>
                        </p>
                        <p style="font-weight: 500; color: black; font-size: 1.1em" class="card-text"> 
                            Expiration date: <strong> {{ $payment->pivot->expiration_date }} </strong>
                        </p>

                    </div>
                    
                    
                    <div class="links" style="display: flex; margin-top: 1em">
                        <form style="width: 25%" action="{{ route('profile.payments.destroy', ['payment' => $payment->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="app-remove-btn">
                                <i style="font-size: 1.7em;" class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                        <a class="app-action-btn" href="" style="width: 70%; margin-left: auto">
                            <i style="font-size: 1.7em" class="fa fa-pencil" aria-hidden="true"></i>
                            <span style="font-size: 1.7em; padding-left: 5px">Change</span>
                        </a>
                    </div>
                </div>
            </div>
            
        @endforeach
        
    </div>
    
</div>


@endsection