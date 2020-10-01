<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();

// FIXME: Move all the routes in auth middleware
Route::redirect('/', 'home');
Route::view('/aboutus', 'aboutus'); // TODO: about-us
Route::post('/review', 'ReviewController@store');
Route::get('/products/{product}', 'ProductController@index');

Route::middleware('auth')->group(function() {

    Route::resource('/home', 'HomepageController');
    Route::resource('/search', 'SearchResultsController');
    Route::resource('carts.products', 'CartProductController');
});





