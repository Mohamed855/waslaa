<?php

namespace App\Http\Controllers\API\App;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Location\CountryResource;
use App\Traits\ResponseTrait;

class CountryController extends Controller
{
    use ResponseTrait;

    private AppHelper $app;

    public function __construct()
    {
        $this->app = new AppHelper();
    }
    public function getCountries()
    {
        $allCountries = $this->app->activeCountry()->with('activeCities')->get();
        return CountryResource::collection($allCountries);
    }
}
