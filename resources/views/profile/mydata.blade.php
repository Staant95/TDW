@extends('profile.master')

@section('title', 'Your data')

@section('panel-content')

<div style="width: 78%; padding-left: 10 px">

    <h2>Your personal data</h2>


    <div class="app-user-name app-user-container">
        <div class="app-user-icon">
            <i class="fa fa-user" aria-hidden="true"></i>
        </div>

        <div class="app-user-info">

            
                <div>
                    <h6>Name</h6>
                    <p>{{ $user->name }} {{ $user->lastname }}</p>
                </div>
        
                <div>
                    <h6>Date of birth</h6>
                    <p>--</p>
                </div>
        
                <div>
                    <h6>Phone number</h6>
                    <p>321445784</p>
                </div>

                <div class="app-change">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    <a href="">Change</a>
                </div>


            </div>

    </div>

    <hr>

    <div class="app-user-email app-user-container">
        <div class="app-user-icon">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </div>

        <div class="app-user-info">

            <div>
                <h6>Your email</h6>
                <p>{{ $user->email }}</p>
            </div>

            <div class="app-change">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                <a href="">Change</a>
            </div>

        </div>
       
    </div>


    <hr>


    <div class="app-user-password app-user-container">
        <div class="app-user-icon">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </div>

        <div class="app-user-info">
            
            <div>
                <h6>Your password</h6>
                <p>******************</p>
            </div>
            <div class="app-change">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                <a href="">Change</a>
            </div>

        </div>

    </div>


    <hr>

</div>



@endsection