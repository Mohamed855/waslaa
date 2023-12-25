<?php

namespace App\Http\Middleware;

use App\Traits\ErrorTrait;
use App\Traits\ResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckConnection
{
    use ErrorTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            DB::connection()->getPdo();
            return $next($request);
        } catch (\Exception $e) {
            return abort(500);
        }
    }
}
