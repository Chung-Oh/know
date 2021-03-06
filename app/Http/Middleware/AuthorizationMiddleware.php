<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizationMiddleware
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
        /**
         * I need create logic for Admin section
         */
        if(!$request->is('auth/login') && \Auth::guest()) {
            return redirect('questions');
        }

        return $next($request);
    }
}
