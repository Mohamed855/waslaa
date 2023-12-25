<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait {
    public function returnError ($message): JsonResponse
    {
        return response()->json([
            'success'  => false,
            'message'  => $message,
            'data' => '',
        ]);
    }

    public function returnSuccess ($message): JsonResponse
    {
        return response()->json([
            'success'  => true,
            'message'  => $message,
            'data' => '',
        ]);
    }

    public function returnData ($message,$data): JsonResponse
    {
        return response()->json([
            'success'  => true,
            'message'  => $message,
            'data' => $data,
        ]);
    }
}
