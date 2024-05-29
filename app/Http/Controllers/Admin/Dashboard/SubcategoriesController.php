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

class SubcategoriesController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $resource;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'subcategory';
        $this->resource = 'subcategories';
        $this->middleware('guard:vendor')->only('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        $categories = auth('vendor')->user()->categories()->where('active', 1)->get();
        $vendorId = auth('vendor')->id();
        return parent::VendorIndexBase($this->resource, 'dashboard.subcategories.index', vars: ['categories' => $categories, 'vendorId' => $vendorId], with: ['category'], searchable: ['name_en', 'name_ar']);
    }

    /**
     * Display a listing of the vendors' subcategories.
     */
    public function vendorSubcategories(string $username): View|RedirectResponse
    {
        $vendor = DashboardHelper::getVendorByUsername($username);
        $categories = $vendor->categories()->where('active', 1)->get();
        $vendorId = $vendor->id;
        $data = DashboardHelper::returnDataOnPagination($vendor->subcategories());
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.subcategories.index', compact(['data', 'categories', 'username', 'vendorId']))->with(['nameOnLang' => $this->nameOnLang]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'category_id', 'vendor_id', 'avatar'], $this->createSubcategoryRules());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'category_id', 'vendor_id', 'avatar'], $this->updateSubcategoryRules($id), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
