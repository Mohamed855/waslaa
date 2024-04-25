<?php

namespace App\Http\Resources\User;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressesRecourse extends JsonResource
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
            'address' => Helper::getFullAddress($this),
            'city' => $this['city'][Helper::getColumnOnLang('name')],
            'isMain' => (bool) $this['main'],
        ];
    }
}
