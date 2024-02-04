<?php

namespace App\Http\Middleware;

use App\Helpers\DashboardHelper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \\Illuminate\\Http\\Request  $request
     * @param  \\Closure  $next
     * @param string $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $guard): mixed
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
        } else {
            $currGuard = DashboardHelper::getCurrentGuard();
            if ($currGuard != 'notAuthorized') {
                return redirect()->route($currGuard . '.overview');
            }
            return redirect()->route('signIn');
        }
    }
}
