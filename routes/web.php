<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();


Route::redirect('/', 'home');
Route::view('/aboutus', 'aboutus');
Route::view('/contact', 'contact');

Route::middleware('auth')->group(function() {

    Route::resource('/home', 'HomepageController');

    Route::resource('/search', 'SearchResultsController');
    
    Route::get('/checkout', 'CheckoutController@index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
    Route::resource('carts.products', 'CartProductController');

    Route::resource('wishlists.products', 'WishlistProductController');

    Route::post('/reviews', 'ReviewController@store');
    Route::get('/products/{product}', 'ProductController@index');
    
    Route::redirect('/profile', '/profile/details')->name('profile');
    Route::get('/profile/details', 'ProfileController@index')->name('profile.details');
    Route::get('/profile/orders', 'ProfileController@orders')->name('profile.orders');
    Route::get('/profile/payments', 'ProfileController@payments')->name('profile.payments');
    Route::get('/profile/addresses', 'ProfileController@addresses')->name('profile.addresses');


});





