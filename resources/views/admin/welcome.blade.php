@extends('admin.master')

@section('main-content')
    <h2>Welcome, {{ Auth::user()->name }}!</h2>
    <p style="font-size: 1.1em; margin-top: .5em">Here you can manage all resource in our database.</p>
@endsection