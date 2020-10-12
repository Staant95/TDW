@extends('profile.master')

@section('panel-content')

<div class="app-tab-content">

    <div class="card app-payment" style="height: 100%">
        <a id="app-add-payment" href="{{ route('profile.addresses.create') }}">
            <img src="{{ asset('storage/plus.svg') }}" alt="" >
            <p>Add address</p> 
        </a>
    </div>

    @foreach ($addresses as $address)
        
        <div class="card app-payment" style="height: 100%">
            <div class="card-body app-card-content">
                <h5 class="card-title">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h5>
                <p class="card-text"> {{ $address->street }} </p>
                <p class="card-text"> {{ $address->city }} {{ $address->zip }} </p>
                <p class="card-text"> Italy </p>
                <div class="links">
                    <form action="{{ route('profile.addresses.destroy', ['address' => $address->id]) }}" method="POST">
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