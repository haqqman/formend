<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PinEnabled
{
    /**
     * Make sure the logged in user has pin verification enabled
     * before they can perform any pin verification action.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return Auth::user()->isPinEnabled()
            ? $next($request)
            : redirect()->route('dashboard');
    }
}
