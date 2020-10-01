<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();

// FIXME: Move all the routes in auth middleware
Route::redirect('/', 'home');
Route::view('/aboutus', 'aboutus'); // TODO: about-us


Route::middleware('auth')->group(function() {

    Route::resource('/home', 'HomepageController');
    Route::resource('/search', 'SearchResultsController');

    Route::resource('wishlists.products', 'WishlistProductController');
    Route::post('/reviews', 'ReviewController@store');
    Route::get('/products/{product}', 'ProductController@index');

});





