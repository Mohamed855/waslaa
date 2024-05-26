<?php

namespace App\Http\Controllers\API\User;

use Exception;
use App\Traits\ErrorTrait;
use App\Traits\QueriesTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Helpers\User\FavoritesHelper;

class FavoritesController extends Controller
{
    use QueriesTrait, ResponseTrait, ErrorTrait;

    private FavoritesHelper $favorites;

    public function __construct()
    {
        $this->favorites = new FavoritesHelper();
    }

    public function favorites ($type)
    {
        if (! in_array($type, ['product', 'vendor']))
            return $this->returnError('Invalid type');

        return $type == 'product' ? $this->favorites->getFavoriteProducts() : $this->favorites->getFavoriteVendors();
    }

    public function toggleFavorite ($type, $id): JsonResponse
    {
        try {
            if (! in_array($type, ['product', 'vendor']))
                return $this->returnError('Invalid type');

            if ($type == 'product') {
                $selected = $this->activeProduct()->find($id, ['name_' . App::getLocale() . ' as name']);
                $favorite = $this->favoriteProducts();
            } else {
                $selected = $this->activeVendor()->find($id, ['name']);
                $favorite = $this->favoriteVendors();
            }

            $exist = $favorite->where('user_id', auth()->id())->where('favorite_id', $id)->first();

            if ($exist) {
                $exist->delete();
                return $this->returnSuccess($selected['name'] . ' removed from favorites');
            }

            $favorite->create([ 'type' => $type, 'favorite_id' => $id, 'user_id' => auth()->id() ]);

            return $this->returnSuccess($selected['name'] . ' added to favorites');
        } catch (Exception $e) {
            return $this->exceptionError($e);
        }
    }
}
