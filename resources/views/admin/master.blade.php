@extends('layouts.app')

@section('title', 'Admin panel')


@section('content')

<h3 style="margin-top: 1em; margin-left: 1.4em">Welcome, {{ Auth::user()->name }}</h3>

<div class="panel">

    <nav class="panel__nav">
        <ul class="panel__nav__list">
            
                <li class="panel__nav__item"> 
                    <a href="http://localhost:8000/admin-panel/users"> Users </a>
                </li>


                <li class="panel__nav__item"> 
                    <a href="http://localhost:8000/admin-panel/products"> Products </a>
                </li>


                <li class="panel__nav__item"> 
                    <a href="http://localhost:8000/admin-panel/orders"> Orders </a>
                </li>


                <li class="panel__nav__item"> 
                    <a href="http://localhost:8000/admin-panel/roles"> Roles </a>
                </li>


                <li class="panel__nav__item"> 
                    <a href="http://localhost:8000/admin-panel/permissions"> Permissions</a>
                </li>
           
        </ul>
    </nav>

    <main class="main__content">

        @yield('main-content')

    </main>

</div>


@endsection