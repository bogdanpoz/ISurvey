<?php

namespace App\Http\Middleware;

use App;
use Closure;

class DemoPreventUpdate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (App::environment('demo')) {
            if (in_array($request->method(), ['POST', 'PUT', 'DELETE'])) {
                flash('This action is disabled in the demo version.', 'error');

                return redirect()->back();
            }
        }

        return $next($request);
    }
}
