<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function() {

   return view('homepage.test')->with(['cartItems' => 4]);
});


Route::get('homepage', 'HomepageController@index')->name('homepage');

Route::get('search', 'SearchResultsController@index')->name('search');

Route::delete('/cart/{id}', function() {
    return view('test');
});


