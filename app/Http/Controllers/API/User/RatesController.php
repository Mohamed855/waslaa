<?php

namespace App\Http\Controllers\API\User;

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

    private function updateRateAvg ($type, $id): void
    {
        $averageRate = $this->rates()->where('type', $type)->where('rate_id', $id)->avg('rate');
        $selected = $type == 'product' ? $this->product() : $this->vendor();

        $selected->find($id)->update(['rate' => $averageRate ?? 0]);
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

            $this->updateRateAvg($type, $id);

            $successMessage = $type == 'product' ? 'Your rate has saved' : 'Thank you for rating us';

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
            $this->updateRateAvg($type, $id);

            return $this->returnSuccess('Your rate has deleted');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }
}
