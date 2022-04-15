<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkAdmin {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null) {
		// dump(Auth::guard('admin')->check());
		// dd(Auth::guard('user')->check());
		if (Auth::guard('admin')->check()) {
			return $next($request);
		} else {
            return redirect('/backend/login');
            return $next($request);
        }
        // return $next($request);
	}
}
