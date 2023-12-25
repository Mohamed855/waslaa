<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderDetailsResource;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\PaginationRecourse;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrdersController extends Controller
{
    use QueriesTrait, ResponseTrait;

    private function getOrders (): AnonymousResourceCollection
    {
        $myOrders = $this->order()->where('user', auth()->id())->paginate(10);
        return OrderResource::collection($myOrders);
    }

    public function orders (): JsonResponse
    {
        return $this->returnData('Orders View', [
            'myOrders' => $this->getOrders(),
        ]);
    }

    public function orderDetails ($id): JsonResponse
    {
        $selectedOrder = $this->order()->where('user', auth()->id())->find($id);
        return $this->returnData('Orders Details View', [
            'OrderDetails' => new OrderDetailsResource($selectedOrder),
        ]);
    }

    public function confirmOrder (Request $request) {
        //
    }

    public function reorder ($id) {
        //
    }

    public function deleteOrder ($id) {
        //
    }
}
