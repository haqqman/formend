<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * There has been unimportant submissions flooding in from endpoints
 * by Bots. Therefore we set up a kind of custom "Honeypot" where we
 * have an hidden field called "_gotcha" that we hope the bot will try to fill,
 * then if _gotcha is filled, it is a BOT.
 *
 * Class HoneyPotMiddleware
 * @package App\Http\Middleware
 */
class HoneyPotMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $honeypot_trap = $request->get('_gotcha', false);

        if ($honeypot_trap)
            return abort(404);

        return $next($request);
    }
}
