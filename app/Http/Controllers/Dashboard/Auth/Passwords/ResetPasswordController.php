<?php

namespace App\Http\Controllers\Dashboard\Auth\Passwords;

use App\Http\Controllers\Controller;
use App\Traits\QueriesTrait;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    use QueriesTrait;

    public function resetPassword(Request $request): View|RedirectResponse
    {
        $email = $request['email'];
        $storedToken = DB::table('password_resets')->where('email', $email)->first();

        if (! $storedToken || $storedToken->created_at < now()->subHour())
            return redirect()->route('signIn')->with(['error' => __('error.somethingWentWrong')]);

        return view('auth.passwords.reset')->with([
            'email' => $email,
            'token' => $request['token']
        ]);
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        try {
            $data = $request->only('email', 'password', 'password_confirmation', 'token');
            $validator = Validator::make($data, [
                'email' => ['required', 'email', 'exists:password_resets,email', function ($attribute, $value, $fail) {
                    $email = DB::table('password_resets')->where('email', $value) ->first();
                    if (! $email || $email->created_at < now()->subHour()) {
                        $fail('The email has expired');
                    }
                },
                ],
                'token' => ['required'],
                'password' => 'required|string|min:8|max:16|confirmed|regex:/^(?=.*[A-Z])(?=.*[0-9]).+$/',
            ]);

            if ($validator->fails())
                return back()->with([ 'error' => $validator->messages()->first() ]);

            if ($this->activeAdmin()->where('email', $data['email'])->exists()) {
                $user = $this->admin();
                $userType = 'admin';
            } elseif ($this->activeVendor()->where('email', $data['email'])->exists()) {
                $user = $this->vendor();
                $userType = 'vendor';
            } elseif ($this->activeManager()->where('email', $data['email'])->exists()) {
                $user = $this->manager();
                $userType = 'manager';
            } else {
                return back()->with(['error' =>  __('error.emailNotFound')]);
            }

            $user = $user->where('email', $data['email'])->first();

            if (! Password::broker($userType . 's')->tokenExists($user, $data['token'])) {
                return back()->with([ 'error' => __('error.tokenExpired') ]);
            }

            $user->update([ 'password' => Hash::make($data['password']) ]);

            DB::table('password_resets')->where('created_at', '<', now()->subHour())->delete();
            DB::table('password_resets')->where('email', $data['email'])->delete();

            return redirect()->route('signIn')->with([
                'success' => __('success.passwordUpdated')
            ]);
        } catch (Exception) {
            return back()->with(['error' => __('error.somethingWentWrong')]);
        }
    }
}
