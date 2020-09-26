<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Auth::routes();

Route::redirect('/', 'home');

Route::middleware('auth')->group(function() {

    Route::resource('/home', 'HomepageController');
    Route::resource('/search', 'SearchResultsController');
    Route::post('/newsletter', function(Request $request) {
        Mail::to($request->input('email'))->send(new \App\Mail\NewsletterSubscription());
        return redirect()->back()->with('subscription', 'Check your email!');
    });
    Route::resource('/profile', 'ProfileController');
});





