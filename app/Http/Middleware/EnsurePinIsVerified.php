<?php

namespace App\Http\Middleware;

use Closure;

class EnsurePinIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Simply proceed to next stack if user doesn't enable PIN verification
        if (!$request->user()->isPinEnabled()) {
            return $next($request);
        }

        // If user hasn't verify their PIN (i.e pin-verified session key absent
        // enforce them to verify pin.
        if (!$request->session()->has('pin-verified')
            && !$request->session()->get('pin-verified'))
            return redirect()->route('pin-verification');

        return $next($request);
    }
}
