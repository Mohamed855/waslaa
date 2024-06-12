<?php

namespace App\Helpers\User;

use App\Helpers\Helper;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use App\Http\Resources\Order\OrderResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrdersHelper
{
    use QueriesTrait, ResponseTrait;

    public function getOrders ()
    {
        $myOrders = $this->order()->where('user_id', auth()->id())->paginate(10);
        return $this->returnData('my orders', Helper::getPaginatedData(OrderResource::collection($myOrders)));
    }

    public function sendNotificationToVendor () {
        //
    }
}
