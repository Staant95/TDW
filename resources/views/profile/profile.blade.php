@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    <div class="container">
        <h1> Hi, {{ Auth::user()->name }}</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>

@endsection
