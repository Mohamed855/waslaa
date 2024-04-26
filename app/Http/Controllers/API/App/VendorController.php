<?php

namespace App\Http\Controllers\API\App;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Location\CountryResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Vendor\VendorResource;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    use ResponseTrait;

    private AppHelper $app;

    public function __construct()
    {
        $this->app = new AppHelper();
    }


    public function selectedVendor ($id): JsonResponse
    {
        $selectedVendor = $this->app->vendor()->with(['subcategories' => function ($subCategoriesQuery) {
            $subCategoriesQuery->where('active', 1);
        }])->findOrFail($id);

        return $this->returnData('Selected Vendor', [
            'countOfFavorites' => $this->app->countOfVendorFavorites($id),
            'myRate' => (int) $this->app->getUserRate('vendor', $id),
            'selectedVendor' => new VendorResource($selectedVendor)
        ]);
    }

    public function subCategoriesWithProduct ($vendorId)
    {
        return $this->app->getSubCategoriesWithProducts($vendorId);
    }
}
