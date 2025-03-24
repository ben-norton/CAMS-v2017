<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class UserAuthentication
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
        if(!Auth::check()) {
            return redirect('/');
        }
        else {
            $user = Auth::user();
            if ($user->hasRole('user')) {
                return $next($request);
            }
            if ($user->hasRole('administrator')) {
                return $next($request);
            }
            else {
                return redirect('unauthorized');
            }
        }
    }
}
