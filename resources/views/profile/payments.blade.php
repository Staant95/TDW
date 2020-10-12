@extends('profile.master')

@section('panel-content')

<div class="app-tab-content">

    <div class="card app-payment" style="height: 100%">
        <a id="app-add-payment" href="{{ route('profile.payments.create') }}">
            <img src="{{ asset('storage/plus.svg') }}" alt="" >
            <p>Add payment method</p> 
        </a>
    </div>


    @foreach ($payments as $payment)
        
        <div class="card app-payment" style="height: 100%">
            <div class="card-body app-card-content">
                <h5 class="card-title">{{ $payment->type }}</h5>
                <p class="card-text"> {{ $payment->pivot->card_number }} </p>
                <p class="card-text"> {{ Auth::user()->name }}  {{ Auth::user()->lastname }}</p>
                <p class="card-text"> {{ $payment->pivot->expiration_date }} </p>
                <div class="links">
                    <form action="{{ route('profile.payments.destroy', ['payment' => $payment->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="app-remove-btn">Remove</button>
                    </form>
                </div>
            </div>
        </div>
        
    @endforeach
    
</div>


@endsection