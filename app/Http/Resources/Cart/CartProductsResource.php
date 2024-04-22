<?php

namespace App\Http\Resources\Cart;

use App\Helpers\Helper;
use App\Http\Resources\Product\ComponentResource;
use App\Http\Resources\Product\TypeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartProductsResource extends JsonResource
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
            'id' => $this['pivot']['id'],
            'name' => $this[Helper::getColumnOnLang('name')],
            'avatar' => url('') . ($this['avatar'] ? '/storage/images/products/' . $this['avatar'] : '/storage/images/global/default.jpg'),
            'offer' => $offer,
            // 'rate' => $this['rate'],
            'components' => ComponentResource::collection($this['_components']),
            'types' => TypeResource::collection($this['_types']),
            'selectedType' => new TypeResource($this['_types'][$this['pivot']['type']]),
            'quantity' => $this['pivot']['quantity'],
        ];
    }
}
