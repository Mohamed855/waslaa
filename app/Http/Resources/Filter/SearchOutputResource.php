<?php

namespace App\Http\Resources\Filter;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchOutputResource extends JsonResource
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
            'name' => $this['name'] ?? $this[Helper::getColumnOnLang('name')],
            'avatar' => $this['avatar'] ?? '/storage/assets/images/vendors/default.jpg',
        ];
    }
}
