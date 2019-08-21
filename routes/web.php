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
Route::middleware(['auth', 'pinIsEnabled'])->namespace('Auth')->group(function() {
    Route::get('/verify-pin', 'PinController@showForm')->name('pin-verification');
    Route::post('/verify-pin', 'PinController@verify');
});

/*
 * Authenticated users route.
 * */
Route::middleware(['auth', 'ensurePinIsVerified'])->group(function() {
    Route::get('/console', 'HomeController@dashboard')->name('dashboard');
    Route::get('/console/setup-domain', 'DomainController@show')->name('setup-domain');
    Route::post('/console/setup-domain', 'DomainController@create');
    Route::get('/console/setup-domain/{id}', 'DomainController@showUpdateForm')->name('update-domain');
    Route::patch('/console/setup-domain/{id}', 'DomainController@update');
    Route::delete('/console/setup-domain/{id}', 'DomainController@delete');
    Route::get('/console/manage-domains', 'DomainController@list')->name('manage-domains');
    /*
     * Console settings
     * */
    Route::get('console/settings', 'SettingsController@show')->name('settings');
    Route::patch('console/settings', 'SettingsController@passwordUpdate')->name('settings.password');
    Route::patch('console/settings/pin', 'SettingsController@pinUpdate')->name('settings.pin');
    Route::patch('console/settings/2SA', 'SettingsController@twoStepAuth')->name('settings.twoFA');

    Route::patch('console/endpoint', 'SettingsController@enableEndpoint')->name('enable-endpoint');
    Route::delete('console/endpoint', 'SettingsController@disableEndpoint')->name('disable-endpoint');
});

/*
 * Capture a form submission to an endpoint
 * */
Route::post('/s/{endpoint}', 'SubmissionController@create')->name('submission');

/*
 * Testing submission email
 * */
