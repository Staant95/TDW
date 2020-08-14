<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/homepage', 'HomepageController@index')->name('homepage');
Route::get('/services', 'HomepageController@index')->name('services');

Route::get('/login', 'HomepageController@index')->name('login');
Route::get('/register', 'HomepageController@index')->name('register');

Route::get('/profile/{user}', function($user) {
    return view('profile', ['data' => $user]);
})->name('profile');


