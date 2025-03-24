<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class ApplicationAccess
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
            return redirect('home');
        }
        else {
            if (Auth::user()->hasRole(array('staff','administrator'))) {
                return $next($request);
            }
            elseif (Auth::user()->hasRole('user')) {
                redirect('home');
            }
            else {
                return redirect('unauthorized');
            }
        }
    }
}
