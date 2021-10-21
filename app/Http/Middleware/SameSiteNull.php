<?php

namespace App\Http\Middleware;

use Closure;

class SameSiteNull
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
        if ($request->input('embed')) {
            config(['session.same_site' => 'none']);
            config(['session.secure' => true]);
        }

        return $next($request);
    }
}
