<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\User\OrdersHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderDetailsResource;
use App\Traits\ErrorTrait;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use App\Traits\Rules\OrderRules;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    use QueriesTrait, ResponseTrait, ErrorTrait;
    use OrderRules;

    private OrdersHelper $orders;

    public function __construct()
    {
        $this->orders = new OrdersHelper();
    }

    public function orders ()
    {
        return $this->orders->getOrders();
    }

    public function orderDetails ($id): JsonResponse
    {
        $selectedOrder = $this->order()->where('user_id', auth()->id())->find($id);

        if (!$selectedOrder) $this->returnError('Something went error');

        return $this->returnData('Orders Details', [
            'OrderDetails' => new OrderDetailsResource($selectedOrder),
        ]);
    }

    public function confirmOrder (Request $request): JsonResponse
    {
        try {
            $orderDetails = $request->all();
            $validator = Validator::make($orderDetails, $this->confirmOrderRules());
            if ($validator->fails())
                return $this->notValidError($validator);

            $this->order()->create($orderDetails + ['user_id' => auth()->id()]);

            $this->orders->sendNotificationToVendor();

            return $this->returnSuccess('Your order has confirmed, you have only 3 minuets to cancel');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function reorder ($id): JsonResponse
    {
        try {
            $selectedOrder = $this->order()->find($id);

            $requiredData = $selectedOrder->only('vendor', 'products', 'address', 'deliveryPhone', 'payMethod', 'deliveryMethod', 'totalCost', 'deliveryNote');

            $this->order()->create($requiredData + ['user_id' => auth()->id()]);

            $this->orders->sendNotificationToVendor();

            return $this->returnSuccess('Your order has sent successfully, you have only 3 minuets to cancel');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function cancelOrder ($id): JsonResponse
    {
        try {
            $selectedOrder = $this->order()->find($id);

            if ($selectedOrder['status'] == 'ordered' && $selectedOrder['created_at']->lt(Carbon::now()->subMinutes(3)))
                return $this->returnError('This order cannot be cancelled, cancellation period has already passed');

            $selectedOrder->update(['status' => 'canceled']);

            return $this->returnSuccess('Order has been canceled');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function deleteOrder ($id): JsonResponse
    {
        try {
            $selectedOrder = $this->order()->find($id);

            if ($selectedOrder['status'] == 'ordered')
                return $this->returnError('You can\'t delete undelivered ordered');

            $selectedOrder->delete();

            return $this->returnSuccess('Order has been deleted');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }
}
