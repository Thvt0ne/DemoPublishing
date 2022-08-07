<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
      public function handle($request, Closure $next)
    {
        // Owner: admin@argon.com
        $user = auth()->user();
        if(strtolower($user->email) == 'admin@argon.com'){
            return $next($request);
        }
        return abort(404);
    }
}
