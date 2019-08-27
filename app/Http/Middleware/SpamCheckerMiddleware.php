<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Response;

/**
 * There has been unimportant submissions flooding in from endpoints
 * by Bots. Therefore we set up a kind of custom "Honeypot" where we
 * have an hidden field called "s-verify" that we hope the bot will try to fill,
 * then if s-verify is filled, it is a BOT.
 *
 * Class SpamCheckerMiddleware
 * @package App\Http\Middleware
 */
class SpamCheckerMiddleware
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
        $formSpamValue = $request->get('s-verify', false);
        if ($formSpamValue)
            return abort(404);

        return $next($request);
    }
}
