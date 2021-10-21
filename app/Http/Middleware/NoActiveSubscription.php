<?php

namespace App\Http\Middleware;

use Closure;

class NoActiveSubscription
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
        if (!auth()->user()->subscription()->exists() || !auth()->user()->subscription->active()) {
            flash(__('You do not have an active subscription'), 'error');

            return redirect()->route('company.billing.plans');
        }

        return $next($request);
    }
}
