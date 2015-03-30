<?php namespace App\Http\Middleware;

use Closure;

class VerifyAccessRole {

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
        $current_url = \Request::url();

        if(strpos($current_url, explode('\\', $current_user->userable_type)[1]) === false) {
            return redirect(explode('\\', $current_user->userable_type)[1].'/index');
        }

		return $next($request);
	}

}
