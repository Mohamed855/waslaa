<?php

namespace App\Http\Middleware;

use App\Traits\AuthTrait;
use App\Traits\ResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssignGuard
{
    use AuthTrait;
    use ResponseTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        if($guard != null) {
            auth()->shouldUse($guard);
            if ($this->checkToken($request))
                return $next($request);
        }
        return $this->returnError('Sign in first');
    }
}
