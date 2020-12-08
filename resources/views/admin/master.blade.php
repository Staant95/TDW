@extends('layouts.app')

@section('title', 'Admin panel')


@section('content')

{{-- <div id="back-link">
    <a href="{{ route('home.index') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
        Go back home
    </a>
</div> --}}

<div class="panel">

    <nav class="panel__nav">

    <div id="back-link">
        <a href="{{ route('home.index') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
            Go back home
        </a>
    </div>

    <h3 style="color: white">Admin Panel</h3>

    <hr class="app__divider">
        <ul class="panel__nav__list">
                @php
                    $tables = ['users', 'products', 'roles', 'permissions', 'orders', 'sizes', 'colors', 'addresses']
                @endphp
                @foreach ($tables as $table)
                    <li class="panel__nav__item"> 
                        <a href="http://localhost:8000/admin-panel/{{ $table }}"> {{ ucfirst($table) }} </a>
                    </li>
                @endforeach
            
        </ul>
    </nav>

    <main class="main__content">
        

            @yield('main-content')


    </main>

</div>




@endsection