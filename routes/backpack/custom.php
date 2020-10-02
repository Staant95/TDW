<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('product', 'ProductCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('permission', 'PermissionCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('shop', 'ShopCrudController');
    Route::crud('wishlist', 'WishlistCrudController');
    Route::crud('cart', 'CartCrudController');
    Route::crud('review', 'ReviewCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('coupon', 'CouponCrudController');
    Route::crud('format', 'FormatCrudController');
    Route::crud('address', 'AddressCrudController');
}); // this should be the absolute last line of this file