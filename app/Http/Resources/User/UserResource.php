<?php

namespace App\Http\Resources\User;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this['name'],
            'username' => $this['username'],
            'phone' => $this['phone'],
            'secPhone' => $this['sec_phone'],
            'avatar' => url('') . ($this['avatar'] ? '/storage/images/users/' . $this['avatar'] : '/storage/images/global/profile.jpg'),
            'gender' => $this['gender'],
            'lang' => $this['lang'],
            'city' => $this['city'][Helper::getColumnOnLang('name')],
            'country' => $this['city']['country'][Helper::getColumnOnLang('name')],
        ];
    }
}
