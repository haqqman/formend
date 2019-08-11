<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Always attach user instance variable to the authenticated user
         * header layout blade file.
         * */
        View::composer('layouts.header-auth', function($view) {
            $view->with('user', Auth::user());
        });
    }
}
