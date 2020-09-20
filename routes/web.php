<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Auth::routes();

// DA CAMBIARE CON LA NUOVA HOMEPAGE CHE DOBBIAMO CREARE
Route::view('/home', 'home')->name('home');

Route::get('/', function() {

   return view('homepage.test');
});






