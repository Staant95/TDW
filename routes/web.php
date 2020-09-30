<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();

Route::redirect('/', 'home');
Route::get('/wishlist', 'WishlistController@index');
Route::get('/removewishlist/{product}', 'WishlistController@removeproduct');
// FIXME: la risorsa al plurale
Route::post('/review', 'ReviewController@store');
Route::get('/products/{product}', 'ProductController@index');

Route::middleware('auth')->group(function() {

    Route::resource('/home', 'HomepageController');
    Route::resource('/search', 'SearchResultsController');
    Route::resource('wishlists.products', 'WishlistProductController');

});





