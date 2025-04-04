<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminAuthentication {

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
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
            if ($user->hasRole('administrator')) {
                return $next($request);
            }
            else {
                return response('Unauthorized.', 401);
            }
        }
    }
}
