<?php

/*
 * There is no landing page (yet) - just redirect to login
 * page.
 * */
Route::get('/', function () {
    return redirect()->route('login');
});

/*
 * Guests routes - unprotected/unrestricted routes for users
 * that are not yet logged in.
 * */
Route::namespace('Auth')->group(function() {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');

    Route::get('/logout', 'LoginController@logout')->name('logout');
});

/*
 * Authenticated users route.
 * */
Route::middleware(['auth'])->group(function() {
    Route::get('/console', 'HomeController@dashboard')->name('dashboard');
});
