<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Dashboard\BaseController;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CitiesController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $folder;
    public function __construct()
    {
        $this->table = 'city';
        $this->folder = 'cities';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        $nameOnLang = Helper::getColumnOnLang('name');
        $countries = $this->activeCountry()->get(['id', $nameOnLang . ' as name']);
        return parent::indexBase($this->table, 'dashboard.locations.cities', vars: ['countries' => $countries], searchable: ['name_en', 'name_ar',]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->folder, $request, ['name_en', 'name_ar', 'country_id'], $this->cityRules());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->folder, $request, ['name_en', 'name_ar', 'country_id'], $this->cityRules(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->folder, $id);
    }
}
