<?php

namespace App\Http\Controllers\API\App;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Vendor\VendorResource;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MainController extends Controller
{
    use ResponseTrait;

    private AppHelper $app;

    public function __construct()
    {
        $this->app = new AppHelper();
    }

    public function index () {
        return $this->returnData('Main Page', [
            'ads' => $this->app->getADs(),
            'categories' => $this->app->getCategories()
        ]);
    }

    public function getAds ()
    {
        return $this->app->getADs();
    }

    public function getCategories ()
    {
        return $this->app->getCategories();
    }

    public function search (Request $request)
    {
        if (! in_array($request['type'], ['vendors', 'categories', 'subcategories', 'products']))
            return $this->returnError('Invalid type');

        return $this->app->getSearchOutput($request['type'], $request['key']);
    }

    public function filter (Request $request)
    {
        if (! in_array($request['method'], ['offers', 'rates', 'price']))
            return $this->returnError('Invalid method');

        return $this->app->filterAccordingTo($request['method'], ProductResource::collection($request['products']) , $request['desc']);
    }
}
