<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Cart\CartResource;
use App\Traits\ErrorTrait;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use App\Traits\Rules\CartRules;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    use QueriesTrait, ResponseTrait, ErrorTrait;
    use CartRules;

    public function myCart (): JsonResponse
    {
        $myCart = $this->user()->find(auth()->id())->load(['cart' => function ($productQuery) {
            $productQuery->with(['types'])->paginate(10);
        }]);

        return $this->returnData('User Cart', [
            'myCart' => new CartResource($myCart),
        ]);
    }

    public function checkoutPage (): JsonResponse
    {
        $mainAddress = $this->address()->where('type', 'user')
            ->where('user_id', auth()->id())->where('main', 1)->first();
        $deliveryPhone = $this->user()->find(auth()->id(), ['delivery_phone']);

        return $this->returnData('User Checkout', [
            'address' => Helper::getFullAddress($mainAddress),
            'deliveryPhone' => $deliveryPhone['delivery_phone'],
        ]);
    }

    public function addToCart (Request $request): JsonResponse
    {
        try {
            $collection = $request->only('products');

            foreach ($collection['products'] as $product) {
                $validator = Validator::make($product, $this->addToCartRules());
                if ($validator->fails())
                    return $this->notValidError($validator);
            }

            foreach ($collection['products'] as $product) {
                $cartProductExist = $this->cart()
                    ->where('user', auth()->id())
                    ->where('product', $product['product'])
                    ->where('type', $product['type'])->first();

                if ($cartProductExist) {
                    $cartProductExist->update([
                        'quantity' => $cartProductExist['quantity'] + $product['quantity']
                    ]); continue;
                }

                $this->cart()->create($product + ['user' => auth()->id()]);
            }

            return $this->returnSuccess('Added to cart');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function removeFromCart ($id): JsonResponse
    {
        $selectedProduct = $this->cart()->find($id);

        if (!$selectedProduct || $selectedProduct['user'] != auth()->id())
            return $this->returnError('Something went wrong');

        $selectedProduct->delete();

        return $this->returnSuccess('Removed from cart');
    }
}
