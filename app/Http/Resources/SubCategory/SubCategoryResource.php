<?php

namespace App\Http\Resources\SubCategory;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
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
            'avatar' => url('') . ($this['avatar'] ? '/storage/images/subcategories/' . $this['avatar'] : '/storage/images/global/default.jpg'),
            //'paginationDetails' => new PaginationRecourse($this['pagination']),
        ];
    }
}
