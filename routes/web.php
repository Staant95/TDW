<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Product;

Auth::routes();



Route::middleware('auth')->group(function() {
    

    Route::resource('/home', 'HomepageController');
    
    Route::get('/search', 'SearchResultsController@search')->name('search');
    Route::post('/search', 'SearchResultsController@filter')->name('filter');
    
    Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
    Route::resource('carts.products', 'CartProductController');
    
    Route::resource('wishlists.products', 'WishlistProductController');
    Route::get('/products/{product}', 'ProductController@index')->name('product');

    Route::get('/categories/{category}', 'CategoryController@index')->name('category.index');
    Route::post('/categories/{category}', 'CategoryController@sort')->name('category.sort');

    Route::post('/reviews', 'ReviewController@store')->name('review.store');

    Route::post('/newsletter', 'NewsletterController@store')->name('newsletter');
    
    Route::redirect('/profile', '/profile/orders')->name('profile');
    Route::get('/profile/orders', 'Profile\OrdersController@index')->name('profile.orders');
    Route::get('/profile/orders/{order}', 'Profile\OrdersController@show')->name('profile.orders.show');
    Route::delete('profile/orders/{order}', 'Profile\OrdersController@destroy')->name('profile.orders.destroy');
    Route::get('/profile/payments', 'Profile\PaymentsController@index')->name('profile.payments.index');
    Route::post('/profile/payments', 'Profile\PaymentsController@store')->name('profile.payments.store');
    Route::get('/profile/payments/create', 'Profile\PaymentsController@create')->name('profile.payments.create');
    Route::delete('/profile/payments/{payment}', 'Profile\PaymentsController@destroy')->name('profile.payments.destroy');
    Route::post('/profile/addresses', 'Profile\AddressesController@store')->name('profile.addresses.store');
    Route::get('/profile/addresses', 'Profile\AddressesController@index')->name('profile.addresses.index');
    Route::get('profile/addresses/create', 'Profile\AddressesController@create')->name('profile.addresses.create');
    Route::delete('/profile/addresses/{address}', 'Profile\AddressesController@destroy')->name('profile.addresses.destroy');
    Route::get('/profile/coupons', 'Profile\CouponsController@index')->name('profile.coupons.index');
    Route::get('/profile/my-data', 'Profile\MyDataController@index')->name('profile.mydata');

    Route::redirect('/', 'home');
    Route::view('/aboutus', 'aboutus');
    Route::view('/contact', 'contact');
    Route::post('/email-success', function(){ return view('email-success');});

    // ADMIN ROUTES
    
    Route::redirect('/admin-panel', '/admin-panel/users');
    
    
    Route::resource('/admin-panel/users', 'AdminPanel\UsersController');
    Route::resource('/admin-panel/products', 'AdminPanel\ProductsController');
    Route::resource('/admin-panel/roles', 'AdminPanel\RolesController');
    Route::resource('/admin-panel/permissions', 'AdminPanel\PermissionsController');
    Route::resource('/admin-panel/orders', 'AdminPanel\OrdersController');
    Route::resource('/admin-panel/addresses', 'AdminPanel\AddressesController');

    
});


Route::get('/testing', function() {

    $products = Product::all();

    return view('test')->with('products', $products);
});



