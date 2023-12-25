<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Traits\ErrorTrait;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use App\Traits\Rules\ActionsRules;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use QueriesTrait, ActionsRules, ErrorTrait, ResponseTrait;

    public function profile (): JsonResponse
    {
        $myProfile = $this->user()->with(['_city' => function ($cityQuery) {
            $cityQuery->with('_country');
        }])->find(auth()->id());

        return $this->returnData('Profile View', new UserResource($myProfile));
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

            $this->updateCurrUserDetails($details);

            return $this->returnSuccess('Details updated successfully');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function setDeliveryPhone ($userPhone): JsonResponse
    {
        try {
            $selectedPhone = match ($userPhone) {
                'secondary' => auth()->user()['sec_phone'],
                default => auth()->user()['phone'],
            };

            $this->updateCurrUserDetails([ 'delivery_phone' => $selectedPhone ]);

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

                $this->updateCurrUserDetails([ 'avatar' => Storage::url($imagePath) ]);
            }

            return $this->returnSuccess('Profile Image updated successfully');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function removeProfileImage (): JsonResponse
    {
        try {
            $currUser = auth()->user();

            Helper::deleteImage($currUser['avatar']);

            $this->updateCurrUserDetails([ 'avatar' => null ]);

            return $this->returnSuccess('Profile Image removed successfully');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    private function updateCurrUserDetails (array $request): void
    {
        $this->user()->find(auth()->id())->update($request);
    }
}
