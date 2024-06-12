<?php

namespace App\Helpers\User;

use App\Helpers\Helper;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use App\Http\Resources\Vendor\VendorResource;
use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FavoritesHelper
{
    use QueriesTrait, ResponseTrait;

    public function getFavoriteProducts ()
    {
        $myFavoriteProducts = $this->activeProduct()->whereHas('favorites', function ($query)  {
            $query->where('user_id', auth()->id());
        })->with(['subcategory', 'activeComponents', 'activeTypes'])->paginate(10);
        return $this->returnData('my favorite products', Helper::getPaginatedData(ProductResource::collection($myFavoriteProducts)));
    }

    public function getFavoriteVendors ()
    {
        $myFavoriteVendors = $this->activeVendor()->whereHas('favorites', function ($query)  {
            $query->where('user_id', auth()->id());
        })->with(['city' => function ($cityQuery) {
                $cityQuery->with('country');
            }, 'subcategories' => function ($subCategoriesQuery) {
                $subCategoriesQuery->where('active', 1);
            }])->paginate(10);
        return $this->returnData('my favorite vendors', Helper::getPaginatedData(VendorResource::collection($myFavoriteVendors)));
    }
}
