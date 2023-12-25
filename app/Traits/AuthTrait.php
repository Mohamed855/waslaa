<?php

namespace App\Traits;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

trait AuthTrait {

    protected function currentUser(): ?Authenticatable
    {
        return Auth::guard('api')->user();
    }

    protected function validator($request, $rules): \Illuminate\Validation\Validator
    {
        return Validator::make($request->all(), $rules);
    }

    public function checkToken(Request $request): bool
    {
        $token = $request->header('auth_token');
        $request->headers->set('auth_token', (string) $token, true);
        $request->headers->set('Authorization', 'Bearer ' . $token, true);
        try {
            JWTAuth::parseToken()->authenticate();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
