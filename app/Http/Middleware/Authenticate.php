<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request the application request
     * @param \Closure                 $next    the callback after middleware
     * @param string|null              $guard   the authentication guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($guard == 'admin') {
                return redirect()->route('admin.login');
            } else {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
