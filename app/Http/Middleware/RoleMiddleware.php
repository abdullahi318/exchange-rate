<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $roles = empty($roles) ? [null] : $roles;

        foreach($roles as $role) {
            if($this->checkRole($role) ) {
                return redirect(RouteServiceProvider::ADMIN);
            }
        }
        return $next($request);
    }

    private function checkRole($role) {
        if($role == 'admin') {
            return Auth::user()->hasRole('admin');
        } else {
            
            return Auth::user()->hasRole('user');
        }
            
    }
}
