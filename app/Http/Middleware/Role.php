<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class Role
{

    /**
     * @param $request
     * @param Closure $next
     * @param String $role
     * @return \Illuminate\Http\RedirectResponse|mixed
     *
     * Prevent users from accessing views that are not in line with their roles
     */
    public function handle($request, Closure $next, String $role)
    {
        if (Auth::user()->role == $role)
        {
            return $next($request);
        }else{
            return back();
        }
    }

}
