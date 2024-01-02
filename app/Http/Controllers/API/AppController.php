<?php

namespace App\Http\Controllers\API;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Location\CountryResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Vendor\VendorResource;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AppController extends Controller
{
    use ResponseTrait;

    private AppHelper $app;

    public function __construct()
    {
        $this->app = new AppHelper();
    }

    public function mainPage (): JsonResponse
    {
        return $this->returnData('Main View', [
            'ads' => $this->app->getADs(),
            'categories' => $this->app->getCategories(),
        ]);
    }

    public function categoryPage ($catId, $subCatId = null): JsonResponse
    {
        return $this->returnData('Categories View', [
            'subCategories' => $this->app->getSubCategories($catId),
            'vendors' => $this->app->getVendors($catId, $subCatId),
        ]);
    }

    public function vendorPage ($id): JsonResponse
    {
        $selectedVendor = $this->app->vendor()->find($id);
        return $this->returnData('Selected Vendor View', [
            'countOfFavorites' => $this->app->countOfVendorFavorites($id),
            'myRate' => $this->app->getUserRate('vendor', $id),
            'selectedVendor' => new VendorResource($selectedVendor),
            'subCategoriesWithProduct' => $this->app->getSubCategoriesWithProducts($id),
        ]);
    }

    public function productPage ($id): JsonResponse
    {
        $selectedProduct = $this->app->product()->with(['_subcategory', '_components', '_types'])->find($id);
        return $this->returnData('Selected Product View', [
            'myRate' => $this->app->getUserRate('product', $id),
            'selectedProduct' => new ProductResource($selectedProduct),
        ]);
    }

    public function offersPage (): JsonResponse
    {
        return $this->returnData('Offers View', [
            'offeredProducts' => $this->app->getOfferedProducts(),
        ]);
    }

    public function countries(): JsonResponse
    {
        $allCountries = $this->app->activeCountry()->with(['_cities' => function ($citiesQuery) {
            $citiesQuery->where('active', 1);
        }])->paginate(10);

        return $this->returnData('All Countries', CountryResource::collection($allCountries));
    }

    public function search (Request $request): JsonResponse
    {
        if (! in_array($request['type'], ['vendors', 'categories', 'subcategories', 'products']))
            return $this->returnError('Invalid type');

        return $this->returnData('Search View', [
            'results' => $this->app->getSearchOutput($request['type'], $request['key']),
        ]);
    }

    public function filter (Request $request): JsonResponse
    {
        if (! in_array($request['method'], ['offers', 'rates', 'price']))
            return $this->returnError('Invalid method');

        $filteredProducts = $this->app->filterAccordingTo($request['method'], ProductResource::collection($request['products']) , $request['desc']);
        return $this->returnData('Filtered by ' . $request['method'], $filteredProducts);
    }
}
