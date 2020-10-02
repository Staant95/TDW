<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();


Route::redirect('/', 'home');
Route::view('/aboutus', 'aboutus');

Route::middleware('auth')->group(function() {

    Route::resource('/home', 'HomepageController');
    Route::resource('/search', 'SearchResultsController');
    
    Route::get('/checkout', 'CheckoutController@index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
    Route::resource('carts.products', 'CartProductController');

    Route::resource('wishlists.products', 'WishlistProductController');
    Route::post('/reviews', 'ReviewController@store');
    Route::get('/products/{product}', 'ProductController@index');
    Route::resource('profile', 'ProfileController');


});





