<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');
//Da cambiare

Route::view('/home', 'home')->name('home');

Route::get('/', function() {

   return view('homepage.test');
});






