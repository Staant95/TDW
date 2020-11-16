@extends('profile.master')

@section('panel-content')

<div class="app-tab-content">

    <h1>Your addresses</h1>
    <p style="color: black; font-size: 1.3em; margin-bottom: 2em;">Change your addresses.</p>

    <div style="display: flex">

        <div class="card app-payment" style="height: 100%">
            <a id="app-add-payment" href="{{ route('profile.addresses.create') }}">
                <i style="color: #f7941d;" class="fa fa-plus" aria-hidden="true"></i>
                <p style="color: #f7941d;">Add address</p> 
            </a>
        </div>


        @foreach ($addresses as $address)
            
            <div class="card app-payment" style="height: 100%">
                <div class="card-body app-card-content">
                    <p style="font-weight: 500; color: black">Home address</p>
                    <h4 class="card-title">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h4>
                   
                    <div>

                        <p style="color: black" class="card-text"> {{ $address->street }} </p>
                        <p style="color: black" class="card-text"> {{ $address->city }} {{ $address->zip }} </p>
                        <p style="color: black" class="card-text"> Italy </p>                       

                    </div>

                    
                    <div class="links" style="display: flex; margin-top: 1em">
                        <form class="app-action-btn" style="width: 25%" action="{{ route('profile.addresses.destroy', ['address' => $address->id]) }}" method="POST">
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