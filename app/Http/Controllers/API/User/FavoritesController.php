<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Vendor\VendorResource;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FavoritesController extends Controller
{
    use QueriesTrait, ResponseTrait;
    private function getFavoriteProducts (): AnonymousResourceCollection
    {
        $myFavoriteProducts = $this->activeProduct()
            ->join('favorites as fav', 'fav.favorite_id', 'products.id')
            ->where('fav.type', 'product')
            ->where('fav.user', auth()->id())
            ->with(['_subcategory', '_components', '_types'])
            ->select(['products.*'])
            ->paginate(10);
        return ProductResource::collection($myFavoriteProducts);
    }
    private function getFavoriteVendors (): AnonymousResourceCollection
    {
        $myFavoriteVendors = $this->activeVendor()
            ->join('favorites as fav', 'fav.favorite_id', 'vendors.id')
            ->where('fav.type', 'vendor')
            ->where('fav.user', auth()->id())
            ->with(['_city' => function ($cityQuery) {
                $cityQuery->with('_country');
            }, '_subcategories' => function ($subCategoriesQuery) {
                $subCategoriesQuery->where('active', 1);
            }])->select(['vendors.*'])
            ->paginate(10);
        return VendorResource::collection($myFavoriteVendors);
    }

    public function favorites ($type): JsonResponse
    {
        $myFavorites = $type == 'products' ? $this->getFavoriteProducts() : $this->getFavoriteVendors();
        return $this->returnData('Favorites View', [
            'myFavorites' => $myFavorites,
        ]);
    }

    public function toggleFavorite ($id, $type) {
        //
    }

    public function rate ($id, $type) {
        //
    }
}
