@extends('layouts.master')

@section('title', 'Profile')

@section('content')


    {{-- <div class="container mt-5">

        <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; widht: 70%; margin: 2em auto">
            <img src="{{ asset('storage/user.svg') }}"
            style="width: 150px; height: 150px; display:inline-block; margin-bottom: 1em"
            >
    
            <h3 style="text-align: center"> 
                Hi, {{ Auth::user()->name }}
            </h3>
        </div>
    </div> --}}


<div class="container app-main-container">

    <nav id="app-nav">
        <ul id="app-left-menu">

            <li>
                <a href="{{ route('profile.orders') }}">My orders</a>
            </li>

            <li>
                <a href="{{ route('profile.mydata') }}">My data</a>
            </li>

            <li>
                <a href="{{ route('profile.addresses.index') }}">My addresses</a>
            </li>

            <li>
                <a href="{{ route('profile.payments.index') }}">My payment methods</a>
            </li>

            <li>
                <a href="{{ route('profile.coupons.index') }}">My coupons</a>
            </li>

        </ul>
    </nav>


    @yield('panel-content')


</div>
   
  

@endsection
