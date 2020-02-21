<?php

namespace App\Http\Middleware;

use Closure;

class TecnicoMiddleware
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
        $user = \Illuminate\Support\Facades\Auth::user();
        if($user === null || $user->rol_id !== 2) {
            return redirect(url('/'));
        }
        return $next($request);
    }
}
