<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param string|null              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($request->user()->hasRole('administrator')) {
                return redirect()->route('admin.dashboard');
            }

            if ($request->user()->hasRole('company')) {
                return redirect()->route('company.surveys.index');
            }
        }

        return $next($request);
    }
}
