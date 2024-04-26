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
        $myFavoriteProducts = $this->activeProduct()
            ->join('favorites as fav', 'fav.favorite_id', 'products.id')
            ->where('fav.type', 'product')
            ->where('fav.user_id', auth()->id())
            ->with(['subcategory', 'components', 'types'])
            ->select(['products.*'])
            ->paginate(10);
        return ProductResource::collection($myFavoriteProducts);
    }

    public function getFavoriteVendors (): AnonymousResourceCollection
    {
        $myFavoriteVendors = $this->activeVendor()
            ->join('favorites as fav', 'fav.favorite_id', 'vendors.id')
            ->where('fav.type', 'vendor')
            ->where('fav.user_id', auth()->id())
            ->with(['city' => function ($cityQuery) {
                $cityQuery->with('country');
            }, 'subcategories' => function ($subCategoriesQuery) {
                $subCategoriesQuery->where('active', 1);
            }])->select(['vendors.*'])
            ->paginate(10);
        return VendorResource::collection($myFavoriteVendors);
    }
}
