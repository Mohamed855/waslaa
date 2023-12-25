<?php

namespace App\Http\Resources\Vendor;

use App\Helpers\Helper;
use App\Http\Resources\SubCategory\SubCategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'avatar' => $this['avatar'] ?? '/storage/assets/images/vendors/default.jpg',
            'status' => $this['status'],
            'deliveryTime' => $this['delivery_time'],
            'deliveryCost' => $this['delivery_cost'],
            'rate' => $this['rate'],
            'city' => $this['_city'][Helper::getColumnOnLang('name')],
            'country' => $this['_city']['_country'][Helper::getColumnOnLang('name')],
            'subcategories' => SubCategoryResource::collection($this['_subcategories']),
        ];
    }
}
