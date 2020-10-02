@extends('layouts.app')

@section('title', 'Profile')

@section('content')


    <div class="container">

        <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; widht: 70%; margin: 2em auto">
            <img src="{{ asset('storage/user.svg') }}"
            style="width: 150px; height: 150px; display:inline-block; margin-bottom: 1em"
            >
    
            <h3 style="text-align: center"> 
                Hi, {{ Auth::user()->name }}
            </h3>
        </div>
    </div>

    <div class="container-fluid menu-panel mt-5">

       
            <ul class="list-group list-left" style="margin-top: 10px">
                <li class="list-group-item">
                    <a href="{{ route('profile.personal-info') }}"> Personal information </a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('profile.orders') }}">Orders</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('profile.addresses.index') }}">Addresses</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('profile.payments.index') }}">Payments</a>
                </li>
                <li class="list-group-item">
                    <form 
                    action="{{ route('logout') }}" 
                    method="POST"
                    >
                        @csrf
                        <button class="logout-btn">Logout</button>
                    </form>
                </li>
            </ul>
           <div class="tab-content">


             @yield('panel-content')

           </div>
    </div>



    {{-- <div class="container">
        <h1> Hi, {{ Auth::user()->name }}</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div> --}}

@endsection
