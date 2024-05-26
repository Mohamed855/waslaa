<?php

namespace App\Http\Controllers\Admin\Auth;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\DashboardHelper;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
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

            App::setLocale($authUser['lang']);
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
