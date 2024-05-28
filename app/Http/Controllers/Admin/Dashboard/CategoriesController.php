<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Http\Request;
use App\Helpers\DashboardHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Admin\BaseController;

class CategoriesController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $resource;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'category';
        $this->resource = 'categories';
        $this->middleware('guard:admin')->only(['store', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        $categories = $this->activeCategory()->get();
        $vars = ['categories' => $categories, 'nameOnLang' => $this->nameOnLang];
        $categoryIndexView = 'dashboard.categories.index';
        $searchable = ['name_en', 'name_ar'];

        if (auth('admin')->check()) {
            return parent::indexBase($this->table, $categoryIndexView, vars: $vars, searchable: $searchable);
        } else {
            return parent::VendorIndexBase($this->resource, $categoryIndexView, vars: $vars, searchable: $searchable);
        }
    }

    /**
     * Display a listing of the vendors' categories.
     */
    public function vendorCategories(string $username): View|RedirectResponse
    {
        $vendor = DashboardHelper::getVendorByUsername($username);
        $vendorId = auth('vendor')->check() ? auth('vendor')->id() : $vendor->id;
        $categories = $this->activeCategory()->get();
        $selectedVendorCategories = auth('vendor')->check() ? auth('vendor')->user()->categories() : $vendor->categories();
        $data = DashboardHelper::returnDataOnPagination($vendor->categories());
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.categories.index', compact(['data', 'categories', 'selectedVendorCategories', 'username']))->with(['nameOnLang' => $this->nameOnLang, 'vendorId' => $vendorId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'avatar'], $this->createCategoryRules());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'avatar'], $this->updateCategoryRules($id), $id);
    }

    public function selectVendorCategory(Request $request): RedirectResponse
    {
        $vendorId = $request->vendor_id;
        DB::table('vendor_categories')->where('vendor_id', $vendorId)->delete();
        foreach (explode(',', $request['categories'][0]) as $category) {
            DB::table('vendor_categories')->insert([
                'category_id' => $category,
                'vendor_id' => $vendorId
            ]);
        }
        return back()->with('success', __('translate.' . $this->table) . ' ' . __('success.added'));
    }

    public function removeVendorCategory(string $id, $vendorId): RedirectResponse
    {
        DB::table('vendor_categories')->where(['vendor_id' => $vendorId, 'category_id' => $id])->delete();
        return back()->with('success', __('translate.' . $this->table) . ' ' . __('success.removed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
