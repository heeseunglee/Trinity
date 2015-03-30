<?php namespace App\Http\Middleware;

use Closure;

class VerifyFirstLogin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $current_user = \Auth::user();
        $uri_prefix = str_replace('App\\', '', $current_user->userable_type);
        if($current_user->is_first_login) {
            return view(strtolower($uri_prefix).'.firstLogin');
        }

		return $next($request);
	}

}
