<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'orderId' => $this['id'],
            'vendor' => $this['vendor'],
            'status' => $this['status'],
            'orderedAt' => date_format($this['created_at'], 'd M Y h:i A') ?? null,
        ];
    }
}
