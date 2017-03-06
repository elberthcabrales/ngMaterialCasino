<?php

namespace App\Http\Middleware;

use Closure;
 use Log;
use JWTAuth;

class CheckRol
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
// tail -f storage/logs/laravel.log para accedera a los logs
        
        $user = JWTAuth::parseToken()->authenticate();
        if($user->Rol!="Encargado"){
              return response('Solo los encargados pueden entrar :(', 401);
        }
        // Log::info($user->Rol);
        return $next($request);
    }
}
