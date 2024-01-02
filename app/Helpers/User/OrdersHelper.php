<?php

namespace App\Helpers\User;

use App\Http\Resources\Order\OrderResource;
use App\Traits\QueriesTrait;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrdersHelper
{
    use QueriesTrait;

    public function getOrders (): AnonymousResourceCollection
    {
        $myOrders = $this->order()->where('user', auth()->id())->paginate(10);
        return OrderResource::collection($myOrders);
    }

    public function sendNotificationToVendor () {
        //
    }
}
