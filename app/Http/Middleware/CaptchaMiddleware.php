<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Formend\GoogleCaptcha;

class CaptchaMiddleware
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
        if (!$request->has('g-recaptcha-response'))
            return $next($request);

        $is_captcha_success = GoogleCaptcha::check($request->get('g-recaptcha-response'));
        if ($is_captcha_success) {
            // remove recaptcha key from request before going down the controller.
            unset($request['g-recaptcha-response']);
            return $next($request);
        }

        abort(404);
    }
}
