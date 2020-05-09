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
Route::group(['namespace' => 'Auth'], function() {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');

    Route::get('/logout', 'LoginController@logout')->name('logout');
});

/*
 * 2-Step Pin verification routes. For any signed in user that has pin
 * verification enabled are redirected here until they verify their pin
 *
 * */
Route::group(['middleware' => ['auth', 'pinIsEnabled'], 'namespace' => 'Auth'],function() {
    Route::get('/verify-pin', 'PinController@showForm')->name('pin-verification');
    Route::post('/verify-pin', 'PinController@verify');
});

/*
 * Authenticated users route.
 * */
Route::group(['middleware' => ['auth', 'ensurePinIsVerified'], 'prefix' => 'console'], function () {
    Route::get('/', 'HomeController@dashboard')->name('dashboard');
    Route::get('/setup-domain', 'DomainController@show')->name('setup-domain');
    Route::post('/setup-domain', 'DomainController@create');
    Route::get('/setup-domain/{id}', 'DomainController@showUpdateForm')->name('update-domain');
    Route::patch('/setup-domain/{id}', 'DomainController@update');
    Route::delete('/setup-domain/{id}', 'DomainController@delete');
    Route::get('/manage-domains', 'DomainController@list')->name('manage-domains');
    /*
     * Console settings
     * */
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', 'SettingsController@show')->name('settings');
        Route::patch('/', 'SettingsController@passwordUpdate')->name('settings.password');
        Route::patch('/pin', 'SettingsController@pinUpdate')->name('settings.pin');
        Route::patch('/2SA', 'SettingsController@twoStepAuth')->name('settings.twoFA');
    });

    Route::patch('/endpoint', 'SettingsController@enableEndpoint')->name('enable-endpoint');
    Route::delete('/endpoint', 'SettingsController@disableEndpoint')->name('disable-endpoint');
});
/*
 * Capture a form submission to an endpoint
 * */
Route::post('/s/{endpoint}', 'SubmissionController@create')
    ->middleware(['honeypot', 'gCaptcha'])
    ->name('submission');

/*
 * Testing submission email
 * */
