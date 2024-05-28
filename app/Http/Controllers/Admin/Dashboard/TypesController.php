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

class TypesController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $resource, $abbrevOnLang;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'type';
        $this->resource = 'types';
        $this->abbrevOnLang = Helper::getColumnOnLang('abbrev');
        $this->middleware('guard:vendor')->only('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        return parent::vendorIndexBase($this->resource, 'dashboard.types.index', vars: ['abbrevOnLang' => $this->abbrevOnLang, 'vendorId' => auth('vendor')->id()], searchable: ['name_en', 'name_ar']);
    }

    /**
     * Display a listing of the vendors' types.
     */
    public function vendorTypes(string $username): View|RedirectResponse
    {
        $vendor = DashboardHelper::getVendorByUsername($username);
        $vendorId = $vendor->id;
        $data = DashboardHelper::returnDataOnPagination($vendor->types());
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.types.index', compact(['data', 'username', 'vendorId']))->with(['nameOnLang' => $this->nameOnLang, 'abbrevOnLang' => $this->abbrevOnLang]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'abbrev_en', 'abbrev_ar', 'vendor_id'], $this->createTypeRules());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'abbrev_en', 'abbrev_ar'], $this->updateTypeRules($id), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
