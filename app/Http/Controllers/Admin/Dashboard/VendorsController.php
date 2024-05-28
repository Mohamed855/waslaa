<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Helpers\Helper;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Http\Request;
use App\Helpers\DashboardHelper;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Admin\BaseController;

class VendorsController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $resource;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'vendor';
        $this->resource = 'vendors';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        return parent::indexBase($this->table, 'dashboard.vendors.index', with: ['admin', 'favorites', 'city'], searchable: ['name', 'owner_name', 'username', 'crn', 'email', 'phone']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cities = $this->activeCity()->get();
        return parent::createBase('dashboard.vendors.create', vars: ['cities' => $cities, 'nameOnLang' => $this->nameOnLang]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->resource, $request, ['added_by', 'name', 'owner_name', 'crn', 'email', 'phone', 'password', 'city_id', 'delivery_time', 'delivery_cost', 'avatar'], $this->createVendorRules(), redirectToIndex: true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username): View
    {
        $cities = $this->activeCity()->get();
        $selected = DashboardHelper::getVendorByUsername($username);
        return view('dashboard.vendors.show', compact(['selected', 'cities']))->with(['nameOnLang' => $this->nameOnLang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->resource, $request, ['name', 'username', 'owner_name', 'crn', 'email', 'phone', 'city_id', 'delivery_time', 'delivery_cost', 'priority', 'lang'], $this->updateVendorRules($id), $id, redirectToIndex: true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
