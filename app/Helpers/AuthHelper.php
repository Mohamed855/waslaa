<?php

namespace App\Helpers;

use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthHelper {
    public static function checkToken(Request $request): bool
    {
        $token = $request->header('auth_token');
        $request->headers->set('auth_token', (string) $token);
        $request->headers->set('Authorization', 'Bearer ' . $token);
        try {
            JWTAuth::parseToken()->authenticate();
            return true;
        } catch (Exception) {
            return false;
        }
    }
}
