<?php

namespace App\Http\Middleware;

use App\Helpers\DashboardHelper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MustBeAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \\Illuminate\\Http\\Request  $request
     * @param  \\Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $currGuard = DashboardHelper::getCurrentGuard();
        if ($currGuard == 'notAuthorized') {
            return redirect()->route('signIn');
        }
        return $next($request);
    }
}
