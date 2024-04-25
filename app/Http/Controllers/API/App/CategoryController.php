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

class CategoryController extends Controller
{
    use ResponseTrait;

    private AppHelper $app;

    public function __construct()
    {
        $this->app = new AppHelper();
    }

    public function getSubCategories ($catId)
    {
        return $this->app->getSubCategories($catId);
    }

    public function getVendors ($catId, $subCatId = null)
    {
        return $this->app->getVendors($catId, $subCatId);
    }
}
