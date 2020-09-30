<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role;

            switch ($role)
            {
                case 'admin':
                    return redirect('/a_home');
                    break;
                case 'teacher':
                    return redirect('/t_home');
                    break;
                default:
                    return redirect('/home');
                    break;
            }
            //return redirect('/home');
        }
        return $next($request);
    }
}
