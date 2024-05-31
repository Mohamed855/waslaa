<?php

namespace App\Http\Resources\Product;

use App\Helpers\Helper;
use App\Models\Favorite;
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
        $isFavorite = Favorite::query()->where('type', 'product')->where('favorite_id', $this['id'])
            ->where('user_id', auth()->id())->exists();

        return [
            'id' => $this['id'],
            'name' => $this[Helper::getColumnOnLang('name')],
            'avatar' => url('') . ($this['avatar'] ? '/storage/images/products/' . $this['avatar'] : '/storage/images/global/default.jpg'),
            'offer' => $offer,
            'rate' => $this['rate'],
            'isFavorite' => (bool) $isFavorite,
            'components' => ComponentResource::collection($this['activeComponents']),
            'types' => TypeResource::collection($this['activeTypes']),
        ];
    }
}
