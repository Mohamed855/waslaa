<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Vendor;
use App\Traits\QueriesTrait;
use Illuminate\Support\Facades\Auth;

class DashboardHelper
{
    use QueriesTrait;

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

    public static function getUserByUsername ($username) {
        $with = ['city', 'favoriteVendors', 'vendors', 'complains' => function ($query) {
            $query->with('vendor');
        }];
        if (auth('admin')->check()) {
            $user = User::where('username', $username)->with($with)->firstOrFail();
        } else {
            $user = auth('vendor')->user()->users()->where('username', $username)->with($with)->firstOrFail();
        }
        return $user;
    }

    public static function getVendorByUsername ($username) {
        $with = ['favorites', 'city'];
        $vendor = Vendor::where('username', $username)->with($with)->firstOrFail();
        return $vendor;
    }

    public static function returnDataOnPagination ($data) {
        return $data->paginate(10);
    }
}
