<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Auth::routes();

Route::view('/home', 'home');

Route::get('/', function() {

   return view('homepage.test');
});






