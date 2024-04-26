<?php

namespace App\Http\Resources\Ad;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
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
            'image' => url('') . ($this['image'] ? '/storage/images/ads/' . $this['image'] : '/storage/images/global/default.jpg'),
        ];
    }
}
