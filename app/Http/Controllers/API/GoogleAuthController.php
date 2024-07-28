<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Traits\ErrorTrait;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    use ErrorTrait, QueriesTrait, ResponseTrait;

    public function redirect ()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = $this->user()->firstOrCreate(
                ['email' => $googleUser->getEmail()],
                ['name' => $googleUser->getName(), 'google_id' => $googleUser->getId()]
            );
            Auth::login($user);
            return $this->returnSuccess('User authenticated');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }
}
