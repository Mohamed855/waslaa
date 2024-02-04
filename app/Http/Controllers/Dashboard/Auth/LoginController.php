<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Helpers\DashboardHelper;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(): View
    {
        return view('auth.sign-in');
    }
    public function checkCredentials(Request $request): RedirectResponse
    {
        try {
            $credentials = $request->only('email', 'password');

            $validator = Validator::make($credentials, [
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            if ($validator->fails())
                return back()->with(['error' => $validator->messages()->first()]);

            if (Auth::guard('admin')->attempt($credentials)) {
                $guard = 'admin';
            } elseif (Auth::guard('vendor')->attempt($credentials)) {
                $guard = 'vendor';
            } elseif (Auth::guard('manager')->attempt($credentials)) {
                $guard = 'manager';
            } else {
                return back()->with(['error' => __('error.checkCredentials')]);
            }

            $authUser = auth($guard)->user();

            if (! $authUser['active']) {
                Session::flush();
                Auth::guard($guard)->logout();
                return back()->with('error', __('error.accountDeactivated'));
            }

            app()->setLocale($authUser['lang']);
            return redirect()->route($guard . '.overview');

        } catch (Exception) {
            return back()->with(['error' => __('error.somethingWentWrong')]);
        }
    }

    public function logout(): View
    {
        return view('auth.sign-out');
    }

    public function endSession(): RedirectResponse
    {
        try {
            $guard = DashboardHelper::getCurrentGuard();
            if ($guard == 'notAuthorized') {
                return back()->with(['error' => __('error.somethingWentWrong')]);
            } else {
                Session::flush();
                Auth::guard($guard)->logout();
                return redirect()->route('signIn');
            }
        } catch (Exception) {
            return back()->with(['error' => __('error.somethingWentWrong')]);
        }
    }
}
