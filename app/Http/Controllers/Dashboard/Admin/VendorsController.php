<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Dashboard\BaseController;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VendorsController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $folder;
    public function __construct()
    {
        $this->table = 'vendor';
        $this->folder = 'vendors';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        return parent::indexBase($this->table, 'admin.vendors.index', ['_admin', '_favorites', '_city']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $nameOnLang = Helper::getColumnOnLang('name');
        $cities = $this->activeCity()->get(['id', $nameOnLang . ' as name']);
        return parent::createBase('admin.vendors.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->folder, $request, ['added_by', 'name', 'crn', 'email', 'phone', 'password', 'city', 'delivery_time', 'delivery_cost', 'avatar'], $this->createVendorRules());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $nameOnLang = Helper::getColumnOnLang('name');
        $cities = $this->activeCity()->get(['id', $nameOnLang . ' as name']);
        return parent::showBase($this->table, 'admin.vendors.show', $id, ['cities' => $cities], ['_managers', '_favorites', '_city']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->folder, $request, ['name', 'username', 'crn', 'email', 'phone', 'city', 'delivery_time', 'delivery_cost', 'priority', 'lang'], $this->updateVendorRules($id), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->folder, $id);
    }
}
