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

class ManagersController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $resource;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'manager';
        $this->resource = 'managers';
        $this->middleware('guard:vendor')->only('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        return parent::VendorIndexBase($this->resource, 'dashboard.managers.index', searchable: ['name', 'username', 'email', 'phone']);
    }

    /**
     * Display a listing of the vendors' managers.
     */
    public function vendorManagers(string $username): View|RedirectResponse
    {
        $vendor = DashboardHelper::getVendorByUsername($username);
        $data = DashboardHelper::returnDataOnPagination($vendor->managers());
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.managers.index', compact(['data', 'username']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->resource, $request, ['added_by', 'name', 'email', 'phone', 'password', 'avatar'], $this->createManagerRules());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->resource, $request, ['name', 'username', 'email', 'phone', 'avatar'], $this->updateManagerRules($id), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
