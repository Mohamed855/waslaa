<?php

namespace App\Http\Controllers\API\App;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Vendor\VendorResource;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ResponseTrait;

    private AppHelper $app;

    public function __construct()
    {
        $this->app = new AppHelper();
    }

    public function selectedProduct ($id): JsonResponse
    {
        $selectedProduct = $this->app->product()->with(['subcategory', 'components', 'types'])->find($id);
        return $this->returnData('Selected Product', [
            'myRate' => (int) $this->app->getUserRate('product', $id),
            'selectedProduct' => new ProductResource($selectedProduct),
        ]);
    }

    public function getOffers ()
    {
        return $this->app->getOfferedProducts();
    }
}
