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
 *
 * */
Route::namespace('Auth')->group(function() {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');

    Route::get('/logout', 'LoginController@logout')->name('logout');
});

/*
 * 2-Step Pin verification routes. For any signed in user that has pin
 * verification enabled are redirected here until they verify their pin
 *
 * */
Route::middleware(['auth', 'pin-enabled'])->namespace('Auth')->group(function() {
    Route::get('/verify-pin', 'PinController@showForm')->name('pin-verification');
    Route::post('/verify-pin', 'PinController@verify');
});

/*
 * Authenticated users route.
 * */
Route::middleware(['auth'])->group(function() {
    Route::get('/console', 'HomeController@dashboard')->name('dashboard');
});
