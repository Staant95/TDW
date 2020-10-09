@extends('layouts.master')

@section('title', 'Profile')

@section('content')


    <div class="container mt-5">

        <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; widht: 70%; margin: 2em auto">
            <img src="{{ asset('storage/user.svg') }}"
            style="width: 150px; height: 150px; display:inline-block; margin-bottom: 1em"
            >
    
            <h3 style="text-align: center"> 
                Hi, {{ Auth::user()->name }}
            </h3>
        </div>
    </div>

    <div class="container-fluid app-menu-panel app-container">

       
            <ul class="list-group app-list-left" style="margin-top: 10px">
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
                    <a href="{{ route('profile.coupons.index') }}">Coupons</a>
                </li>
                <li class="list-group-item">
                    <form 
                    action="{{ route('logout') }}" 
                    method="POST"
                    >
                        @csrf
                        <button class="app-logout-btn">Logout</button>
                    </form>
                </li>
            </ul>


           <div class="app-tab-content">

             @yield('panel-content')

           </div>

    </div>



  

@endsection
