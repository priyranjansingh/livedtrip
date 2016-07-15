<?php

namespace App\Http\Middleware;

use Closure;

class FrontauthMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $user_email = session('user_email');
        if (empty($user_email)) {
            return redirect('user/login');
        } 

        return $next($request);
    }

}
