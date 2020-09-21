<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();



Route::resource('homepage', 'HomepageController');

Route::get('search', 'SearchResultsController@index')->name('search');




