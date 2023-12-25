<?php

namespace App\Http\Resources\Product;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'avatar' => $this['avatar'],
            'offer' => $offer,
            'rate' => $this['rate'],
            'components' => ComponentResource::collection($this['_components']),
            'types' => TypeResource::collection($this['_types']),
        ];
    }
}
