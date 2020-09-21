<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();

Route::redirect('/', 'home');

Route::middleware('auth')->group(function() {

    Route::resource('/home', 'HomepageController');
    Route::resource('/search', 'SearchResultsController');

});





