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
    
    Route::get('/search', 'SearchResultsController@search')->name('search');
    Route::post('/q', 'SearchResultsController@filter')->name('filter');
    
    Route::get('/checkout', 'CheckoutController@index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
    Route::resource('carts.products', 'CartProductController');
    
    Route::resource('wishlists.products', 'WishlistProductController');
    Route::get('/products/{product}', 'ProductController@index')->name('product');

    Route::post('/reviews', 'ReviewController@store')->name('review.store');
    
    Route::redirect('/profile', '/profile/orders')->name('profile');
    Route::get('/profile/orders', 'Profile\OrdersController@index')->name('profile.orders');
    Route::get('/profile/payments', 'Profile\PaymentsController@index')->name('profile.payments.index');
    Route::post('/profile/payments', 'Profile\PaymentsController@store')->name('profile.payments.store');
    Route::get('/profile/payments/create', 'Profile\PaymentsController@create')->name('profile.payments.create');
    Route::delete('/profile/payments/{payment}', 'Profile\PaymentsController@destroy')->name('profile.payments.destroy');
    Route::post('/profile/addresses', 'Profile\AddressesController@store')->name('profile.addresses.store');
    Route::get('/profile/addresses', 'Profile\AddressesController@index')->name('profile.addresses.index');
    Route::get('profile/addresses/create', 'Profile\AddressesController@create')->name('profile.addresses.create');
    Route::delete('/profile/addresses/{address}', 'Profile\AddressesController@destroy')->name('profile.addresses.destroy');


});





