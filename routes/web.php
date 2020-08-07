<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('homepage', 'HomepageController@index');
Route::post('homepage', 'HomepageController@store');
Route::get('profile', 'ProfileController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
