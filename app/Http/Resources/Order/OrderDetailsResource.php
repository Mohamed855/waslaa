<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $deliveryTime = $this['updated_at']->diff($this['created_at']);
        return [
            'orderId' => $this['id'],
            'vendor' => $this['vendor'],
            'status' => $this['status'],
            'orderedAt' => date_format($this['created_at'], 'd M Y h:i A') ?? null,
            'address' => $this['address'],
            'phone' => $this['phone'],
            'products' => $this['products'],
            'totalCost' => $this['totalCost'],
            'paymentMethod' => $this['payMethod'],
            'deliveryTime' => $this['status']  == 'delivered' ? ($deliveryTime->h . ':' . $deliveryTime->i) : null,
            'deliveryNote' => $this['deliveryNote'],
        ];
    }
}
