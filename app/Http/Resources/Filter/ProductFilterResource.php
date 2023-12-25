<?php

namespace App\Http\Resources\Filter;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductFilterResource extends JsonResource
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
            'name' => $this['name'],
            'avatar' => $this['avatar'],
            'offer' => $offer,
            'rate' => $this['rate'],
            'components' => ComponentFilterResource::collection($this['components']),
            'types' => TypeFilterResource::collection($this['types']),
        ];
    }
}
