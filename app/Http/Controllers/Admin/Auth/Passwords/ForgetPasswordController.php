<?php

namespace App\Http\Controllers\Admin\Auth\Passwords;

use App\Http\Controllers\Controller;
use App\Traits\QueriesTrait;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller
{
    use QueriesTrait;

    public function requestPassword(): View
    {
        return view('auth.passwords.email');
    }

    public function sendEmailPassword(Request $request): RedirectResponse
    {
        try {
            $email = $request->only('email');

            if ($this->activeAdmin()->where('email', $email['email'])->exists()) {
                $userType = 'admin';
            } elseif ($this->activeVendor()->where('email', $email['email'])->exists()) {
                $userType = 'vendor';
            } elseif ($this->activeManager()->where('email', $email['email'])->exists()) {
                $userType = 'manager';
            } else {
                return back()->with(['error' =>  __('error.emailNotFound')]);
            }

            $validator = Validator::make($email, ['email' => 'required|exists:' . $userType . 's,email']);

            if ($validator->fails())
                return back()->with(['error' => $validator->messages()->first()]);

            $status = Password::broker($userType . 's')->sendResetLink($email);

            if (!$status == Password::RESET_LINK_SENT)
                return back()->with(['error' => __('error.resetLinkNotSent')]);

            return redirect()->route('resetEmailSentSuccessfully', [
                'email' => $email
            ]);
        } catch (Exception) {
            return back()->with(['error' =>  __('error.somethingWentWrong')]);
        }
    }

    public function emailSentSuccessfully(Request $request): View|RedirectResponse
    {
        $email = $request['email'];
        $storedToken = DB::table('password_resets')->where('email', $email)->first();

        if (! $storedToken || $storedToken->created_at < now()->subHour())
            return back()->with(['error' => __('error.somethingWentWrong')]);

        return view('auth.passwords.sentSuccessfully', with([
            'success' => __('success.emailSent')
        ]));
    }
}
