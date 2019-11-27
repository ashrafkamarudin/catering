<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CanUseDashboard
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
        $user = auth()->user();
        if ($user->hasRole(['customer'])) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
