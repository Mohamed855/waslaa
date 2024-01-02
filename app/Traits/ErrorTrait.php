<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ErrorTrait {
    use ResponseTrait;

    public function checkCredentialsError(): JsonResponse
    {
        return $this->returnError('Check credentials');
    }

    public function exceptionError($e): JsonResponse
    {
        return $this->returnError($e->getMessage());
    }

    public function notValidError($validator): JsonResponse
    {
        $inputsHasError = array_keys($validator->errors()->toArray());
        $error = $inputsHasError[0] . ' has failed';
        return $this->returnError(/* $error */ $validator->errors()->first());
    }
}
