<?php

namespace App\Helpers\User;

use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Vendor\VendorResource;
use App\Traits\QueriesTrait;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FavoritesHelper
{
    use QueriesTrait;

    public function getFavoriteProducts (): AnonymousResourceCollection
    {
        $myFavoriteProducts = $this->activeProduct()->whereHas('favorites', function ($query)  {
            $query->where('user_id', auth()->id());
        })->with(['subcategory', 'activeComponents', 'activeTypes'])->paginate(10);
        return ProductResource::collection($myFavoriteProducts);
    }

    public function getFavoriteVendors (): AnonymousResourceCollection
    {
        $myFavoriteVendors = $this->activeVendor()->whereHas('favorites', function ($query)  {
            $query->where('user_id', auth()->id());
        })->with(['city' => function ($cityQuery) {
                $cityQuery->with('country');
            }, 'subcategories' => function ($subCategoriesQuery) {
                $subCategoriesQuery->where('active', 1);
            }])->paginate(10);
        return VendorResource::collection($myFavoriteVendors);
    }
}
