<?php

namespace App\Http\Resources\Cart;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Resources\Product\TypeResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product\ComponentResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $offer = $this['offer'] == 1 ? ['type' => $this['offer_type'], 'value' => $this['offer_value']] : null;

        return [
            'id' => $this['id'],
            'name' => $this[Helper::getColumnOnLang('name')],
            'avatar' => url('') . ($this['avatar'] ? '/storage/images/products/' . $this['avatar'] : '/storage/images/global/default.jpg'),
            'offer' => $offer,
            'rate' => $this['rate'],
            'components' => ComponentResource::collection($this['components']),
            'types' => TypeResource::collection($this['types']),
            'selectedTypeId' => $this['pivot']['type'],
            'quantity' => $this['pivot']['quantity'],
        ];
    }
}
