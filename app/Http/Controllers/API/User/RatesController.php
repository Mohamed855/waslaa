<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\User\RatesHelper;
use App\Http\Controllers\Controller;
use App\Traits\ErrorTrait;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RatesController extends Controller
{
    use QueriesTrait, ResponseTrait, ErrorTrait;

    private RatesHelper $rates;

    public function __construct()
    {
        $this->rates = new RatesHelper();
    }

    public function rate ($type, $id, Request $request): JsonResponse
    {
        try {
            if (! in_array($type, ['product', 'vendor']))
                return $this->returnError('Invalid type');

            $validator = Validator::make($request->only(['rate']), ['rate' => 'required|numeric|in:1,2,3,4,5']);
            if ($validator->fails())
                return $this->notValidError($validator);

            $this->rates()->updateOrCreate([
                'type' => $type,
                'rate_id' => $id,
                'user' => auth()->id(),
                'rate' => $request['rate'],
            ]);

            $this->rates->updateRateAvg($type, $id);

            $successMessage = $type == 'product' ? 'Your rate has been saved' : 'Thank you for rating us';

            return $this->returnSuccess($successMessage);
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function deleteRate ($type, $id): JsonResponse
    {
        try {
            if (! in_array($type, ['product', 'vendor']))
                return $this->returnError('Invalid type');

            $this->rates()->where('type', $type)->where('rate_id', $id)->where('user', auth()->id())->delete();
            $this->rates->updateRateAvg($type, $id);

            return $this->returnSuccess('Your rate has been deleted');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }
}
