<?php

namespace App\Http\Resources\Notification;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'image' => $this['image'] ?? 'storage/images/global/logo-dark.jpg',
            'title' => $this[Helper::getColumnOnLang('name')],
            'body' => $this[Helper::getColumnOnLang('body')],
        ];
    }
}
