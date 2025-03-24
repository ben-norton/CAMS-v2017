<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class DashboardRoleRouteHandler
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
        if (Auth::user()->hasRole(array('staff','administrator')))
        {
            return redirect('dashboard');
        }
        else if (Auth::user()->hasRole('user'))
        {
            return redirect('home');
        }
        else {
            return redirect('unauthorized');
        }
    }
}
