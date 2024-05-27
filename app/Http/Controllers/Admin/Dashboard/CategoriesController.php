<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Admin\BaseController;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $this->middleware('guard:vendor')->only(['selectVendorCategory', 'removeVendorCategory']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        $categories = $this->activeCategory()->get(['id', $this->nameOnLang . ' as name']);
        $vars = ['categories' => $categories];
        $categoryIndexView = 'dashboard.categories.index';
        $searchable = ['name_en', 'name_ar'];

        if (auth('admin')->check()) {
            return parent::indexBase($this->table, $categoryIndexView, vars: $vars, searchable: $searchable);
        } else {
            return parent::VendorIndexBase($this->resource, $categoryIndexView, vars: $vars, searchable: $searchable);
        }
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
        return parent::updateBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'avatar'], $this->updateCategoryRules(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }

    public function selectVendorCategory(Request $request): RedirectResponse
    {
        DB::table('vendor_categories')->where('vendor_id', auth('vendor')->id())->delete();
        foreach (explode(',', $request['categories'][0]) as $category) {
            DB::table('vendor_categories')->insert([
                'category_id' => $category,
                'vendor_id' => auth('vendor')->id()
            ]);
        }
        return back()->with('success', __('translate.' . $this->table) . ' ' . __('success.added'));
    }

    public function removeVendorCategory(string $id): RedirectResponse
    {
        DB::table('vendor_categories')->where(['vendor_id' => auth('vendor')->id(), 'category_id' => $id])->delete();
        return back()->with('success', __('translate.' . $this->table) . ' ' . __('success.removed'));
    }
}
