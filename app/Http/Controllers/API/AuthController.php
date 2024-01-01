<?php

namespace App\Http\Controllers\API;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use App\Traits\ErrorTrait;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use App\Traits\Rules\AuthRules;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use AuthTrait, ErrorTrait, QueriesTrait, ResponseTrait, AuthRules;

    public function signup (Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), $this->signUpRules());
            if ($validator->fails())
                return $this->notValidError($validator);

            $data = $request->only('name', 'phone', 'sec_phone', 'password', 'city', 'gender', 'lang');

            $data['phone'] = Helper::correctPhoneStyle($data['phone']);
            $data['sec_phone'] = $data['sec_phone'] ? Helper::correctPhoneStyle($data['sec_phone']) : null;
            $data['delivery_phone'] = $data['phone'];

            $user = $this->user()->create($data);

            $addressDetails = $request->only('city', 'address', 'building', 'floor', 'flat', 'special_mark');

            $this->address()->create($addressDetails + [
                    'type' => 'user',
                    'user_id' => $user['id'],
                ]);

            $credentials = ['phone' => $user['phone'], 'password' => $request['password'] ];

            $token = Auth::attempt($credentials);

            if (! $token) return $this->checkCredentialsError();

            /*
                check phone number is the same in the device form application
            */

            return $this->returnData('Your account has created successfully', [ 'token' => $token ]);
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function login (Request $request): JsonResponse
    {
        try {
            $credentials = $request->only('phone', 'password');

            $validator = Validator::make($credentials, $this->signInRules());
            if ($validator->fails())
                return $this->notValidError($validator);

            $credentials['phone'] = Helper::correctPhoneStyle($credentials['phone']);

            $token = Auth::attempt($credentials);

            if (! $token) return $this->checkCredentialsError();

            /*
                $remember_token = $request['remember_me'] ? $token : null;
                $this->currentUser()->update(['remember_token' => $remember_token]);
            */

            return $this->returnData('Logged in successfully', [ 'token' => $token ]);
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function reset (Request $request): JsonResponse
    {
        try {
            $request['phone'] = Helper::correctPhoneStyle($request['phone']);

            $validator = Validator::make($request->all(), $this->resetRules());
            if ($validator->fails())
                return $this->notValidError($validator);

            /*
                check phone number is the same in the device form application
            */

            $temporaryToken = bin2hex(random_bytes(10));
            DB::table('password_reset_tokens')->insert([
                'email' => $request['phone'],
                'token' => $temporaryToken,
                'created_at' => now(),
            ]);

            return $this->returnData('This token will expire after 10 minuets', $temporaryToken);
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function updatePassword (Request $request): JsonResponse
    {
        try {
            $data = $request->only('token', 'password', 'password_confirmation');

            $validator = Validator::make($request->all(), $this->updatePasswordRules());
            if ($validator->fails())
                return $this->notValidError($validator);

            $target = DB::table('password_reset_tokens')->where('token', $data['token']);
            $this->user()->where('phone', $target->first()->email)->update([
                'password' => Hash::make($data['password']),
            ]);
            DB::table('password_reset_tokens')->where('created_at', '<', now()->subHour())->delete();
            $target->delete();

            return $this->returnSuccess('Password updated successfully');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function logout(): JsonResponse
    {
        auth('api')->logout();
        return $this->returnSuccess('logged out successfully');
    }
}
