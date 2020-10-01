<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();



Route::middleware('auth')->group(function() {

    Route::resource('/home', 'HomepageController');
    Route::resource('/search', 'SearchResultsController');
    Route::resource('wishlists.products', 'WishlistProductController');
    Route::redirect('/', 'home');
    Route::post('/reviews', 'ReviewController@store');
    Route::get('/products/{product}', 'ProductController@index');

});





