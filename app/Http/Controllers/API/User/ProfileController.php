<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Helper;
use App\Helpers\User\ProfileHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Traits\ErrorTrait;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use App\Traits\Rules\ProfileRules;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use QueriesTrait, ErrorTrait, ResponseTrait;
    use ProfileRules;

    private ProfileHelper $profile;

    public function __construct()
    {
        $this->profile = new ProfileHelper();
    }

    public function profile (): JsonResponse
    {
        return $this->returnData('User Profile', new UserResource(auth('api')->user()));
    }

    public function updateProfile (Request $request): JsonResponse
    {
        try {
            $details = $request->all();
            $validator = Validator::make($details, $this->updateProfileRules());
            if ($validator->fails())
                return $this->notValidError($validator);

            if (isset($details['phone']))
                $details['phone'] = Helper::correctPhoneStyle($details['phone']);
            if (isset($details['sec_phone']))
                $details['sec_phone'] = Helper::correctPhoneStyle($details['sec_phone']);

            $currUser = auth()->user();

            if ($details['sec_phone'] && $currUser['delivery_phone'] == $currUser['sec_phone'])
                $details['delivery_phone'] = $details['sec_phone'];
            else
                $details['delivery_phone'] = $details['phone'];

            $this->profile->updateCurrUserDetails($details);

            return $this->returnSuccess('Details updated successfully');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function changePassword (Request $request): JsonResponse
    {
        try {
            $passwords = $request->only('old_password', 'new_password', 'new_password_confirmation');
            $validator = Validator::make($passwords, $this->changePasswordRules());
            if ($validator->fails())
                return $this->notValidError($validator);

            $currUser = $this->user()->find(auth()->id());

            $credentials =  [
                'phone' => $currUser['phone'],
                'password' => $passwords['old_password'],
            ];

            if (! Auth::attempt($credentials))
                return $this->returnError('Old password isn\'t valid');

            $this->profile->updateCurrUserDetails(['password' => $passwords['new_password'] ]);

            return $this->returnSuccess('Password changed successfully');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function setDeliveryPhone ($userPhone): JsonResponse
    {
        try {
            if (! in_array($userPhone, ['primary', 'secondary']))
                return $this->returnError('Invalid type');

            if ($userPhone == 'secondary' && auth()->user()['sec_phone'] == null) {
                $userPhone = 'primary';
            }

            $selectedPhone = match ($userPhone) {
                'secondary' => auth()->user()['sec_phone'],
                default => auth()->user()['phone'],
            };

            $this->profile->updateCurrUserDetails([ 'delivery_phone' => $selectedPhone ]);

            return $this->returnSuccess('Delivery phone has set successfully');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function updateProfileImage (Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->only('profileImage'), $this->updateProfileImageRules());
            if ($validator->fails())
                return $this->notValidError($validator);

            $currUser = auth()->user();

            $profileImage = $request->file('profileImage');

            if ($profileImage) {
                $imagePath = Helper::storeImage($profileImage, 'users');

                Helper::deleteImage($currUser['avatar']);

                $this->profile->updateCurrUserDetails([ 'avatar' => Storage::url($imagePath) ]);
            }

            return $this->returnSuccess('Profile image updated successfully');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function removeProfileImage (): JsonResponse
    {
        try {
            $currUser = auth()->user();

            Helper::deleteImage($currUser['avatar']);

            $this->profile->updateCurrUserDetails([ 'avatar' => null ]);

            return $this->returnSuccess('Profile image has been removed');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function deleteAccount (): JsonResponse
    {
        try {
            $currUser = auth()->user();

            Helper::deleteImage($currUser['avatar']);

            $currUser->delete();

            return $this->returnSuccess('Your account has been deleted');
        } catch (Exception $e) {
            return $this->returnError($e);
        }
    }
}
