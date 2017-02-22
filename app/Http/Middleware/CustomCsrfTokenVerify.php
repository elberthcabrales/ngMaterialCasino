<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Session\TokenMismatchException;

class CustomCsrfTokenVerify
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
        if(Session::token() != $request->input('_token')){
             throw new TokenMismatchException;
        }
        return $next($request);
    }
}
