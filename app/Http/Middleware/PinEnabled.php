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
        // If PIN is already verified, take them to the dashboard.
        if ($request->session()->has('pin-verified')
            && $request->session()->get('pin-verified'))
            return redirect()->route('dashboard');

        /*
         * Check if user has PIN verification option enabled.
         * We don't want someone without pin verification seeing this.
         * */
        return Auth::user()->isPinEnabled()
            ? $next($request)
            : redirect()->route('dashboard');
    }
}
