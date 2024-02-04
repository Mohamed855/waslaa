<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class DashboardHelper
{
    public static function getCurrentGuard(): string
    {
        if (Auth::guard('admin')->check()) {
            $guard = 'admin';
        } elseif (Auth::guard('vendor')->check()) {
            $guard = 'vendor';
        } elseif (Auth::guard('manager')->check()) {
            $guard = 'manager';
        } else {
            $guard = 'notAuthorized';
        }
        return $guard;
    }
}
