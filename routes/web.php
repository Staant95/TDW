<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function() {

   return view('homepage.test')->with(['cartItems' => 4]);
});


Route::resource('homepage', 'HomepageController');

Route::get('search', 'SearchResultsController@index')->name('search');




