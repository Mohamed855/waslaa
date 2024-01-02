<?php

namespace App\Http\Resources\Vendor;

use App\Helpers\Helper;
use App\Http\Resources\SubCategory\SubCategoryResource;
use App\Models\Favorite;
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
        $isFavorite = Favorite::query()->where('type', 'vendor')->where('favorite_id', $this['id'])
            ->where('user', auth()->id())->first(['id']);

        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'avatar' => $this['avatar'] ?? '/storage/assets/images/vendors/default.jpg',
            'status' => $this['status'],
            'deliveryTime' => $this['delivery_time'],
            'deliveryCost' => $this['delivery_cost'],
            'rate' => $this['rate'],
            'isFavorite' => (bool) $isFavorite,
            'city' => $this['_city'][Helper::getColumnOnLang('name')],
            'country' => $this['_city']['_country'][Helper::getColumnOnLang('name')],
            'subcategories' => SubCategoryResource::collection($this['_subcategories']),
        ];
    }
}
