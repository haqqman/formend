<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Response;

/**
 * There has been unimportant submissions flooding in from endpoints
 * by Bots. Therefore we set up a kind of custom "Honeypot" where we
 * have an hidden field called "s-verify" that we hope the bot will try to fill,
 * the s-verify will hold the endpoint unique id, and we crosscheck if it matches.
 * Otherwise, a Bot has changed it, and it is a SPAM.
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
        $endpoint = $request->route('endpoint');
        $formSpamValue = $request->get('s-verify');
        if ($endpoint !== $formSpamValue)
            return Response::view('errors.404', [], 404);

        return $next($request);
    }
}
