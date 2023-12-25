<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Vendor\VendorResource;
use App\Traits\ErrorTrait;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FavoritesController extends Controller
{
    use QueriesTrait, ResponseTrait, ErrorTrait;
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
        if (! in_array($type, ['product', 'vendor']))
            return $this->returnError('Invalid type');

        $myFavorites = $type == 'product' ? $this->getFavoriteProducts() : $this->getFavoriteVendors();
        return $this->returnData('Favorites View', [
            'myFavorites' => $myFavorites,
        ]);
    }

    public function toggleFavorite ($type, $id): JsonResponse
    {
        try {
            if (! in_array($type, ['product', 'vendor']))
                return $this->returnError('Invalid type');

            $selected = $type == 'product' ? $this->activeProduct()->find($id, ['name_' . app()->getLocale() . ' as name']) :
                $this->activeVendor()->find($id, ['name']);

            $favorite = $type == 'product' ? $this->favoriteProducts() : $this->favoriteVendors();

            $exist = $favorite->where('user', auth()->id())->where('favorite_id', $id)->first();

            if ($exist) {
                $exist->delete();
                return $this->returnSuccess($selected['name'] . ' removed from favorites');
            }

            $favorite->create([ 'type' => $type, 'favorite_id' => $id, 'user' => auth()->id() ]);
            return $this->returnSuccess($selected['name'] . ' added to favorites');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }

    public function rate ($type, $id) {
        if (! in_array($type, ['product', 'vendor']))
            return $this->returnError('Invalid type');
    }
}
