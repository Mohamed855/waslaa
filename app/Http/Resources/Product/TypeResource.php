<?php

namespace App\Http\Resources\Product;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeResource extends JsonResource
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
            'name' => $this[Helper::getColumnOnLang('name')],
            'abbrev' => $this[Helper::getColumnOnLang('abbrev')],
            'price' => $this['pivot']['price'],
        ];
    }
}
