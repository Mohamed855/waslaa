<?php

namespace App\Http\Controllers\API\User;

use stdClass;
use Exception;
use App\Traits\ErrorTrait;
use App\Traits\QueriesTrait;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Traits\Rules\AddressRules;
use App\Helpers\User\AddressHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddressesController extends Controller
{
    use QueriesTrait, ResponseTrait, ErrorTrait;
    use AddressRules;

    private AddressHelper $address;

    public function __construct()
    {
        $this->address = new AddressHelper();
    }

    public function addresses (): JsonResponse
    {
        $myPhone = $this->user()->find(auth()->id(), ['phone', 'sec_phone']);
        $myAddresses = new stdClass();
        foreach ($this->address->getAddresses() as $key => $value) {
            $myAddresses->$key = $value;
        }
        return $this->returnData('User addresses', [
            'myAddresses' => $myAddresses,
            'myPhone' => [
                'phone' => $myPhone['phone'],
                'sec_phone' => $myPhone['sec_phone'],
            ],
        ]);
    }

    public function addAddress (Request $request): JsonResponse
    {
        try {
            $userAddresses = $this->address()->where('type', 'user')->where('user_id', auth()->id());
            if ($userAddresses->count() >= 3)
                return $this->returnError('You can add only 3 addresses');

            $addressDetails = $request->all();
            $validator = Validator::make($addressDetails, $this->addAddressRules());

            if ($validator->fails())
                return $this->notValidError($validator);

            $this->address()->create($addressDetails + [
                    'type' => 'user',
                    'user_id' => auth()->id(),
                    'main' => 0,
                ]);

            return $this->returnSuccess('Address added successfully');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function setMainAddress ($id): JsonResponse
    {
        try {
            $userAddress = $this->address()->where('type', 'user')->where('user_id', auth()->id());
            $mainAddress = $userAddress->where('main', '1')->first();
            $mainAddress?->update(['main' => 0]);

            $selectedAddress = $this->address()->where('type', 'user')->where('user_id', auth()->id())->find($id);
            if (! $selectedAddress) return $this->returnError('Invalid ID');
            $selectedAddress?->update(['main' => 1]);

            return $this->returnSuccess('Main address has set');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function deleteAddress ($id): JsonResponse
    {
        try {
            $selectedAddress = $this->address()->where('type', 'user')->where('user_id', auth()->id())->find($id);

            if (! $selectedAddress) {
                return $this->returnError('Invalid ID');
            } else {
                if ($selectedAddress['main'] == 1)
                    return $this->returnError('You can\'t delete the main address');
                $selectedAddress->delete();
                return $this->returnSuccess('Address has been deleted');
            }
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }
}
