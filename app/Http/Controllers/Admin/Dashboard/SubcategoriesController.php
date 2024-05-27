<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Admin\BaseController;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubcategoriesController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $resource;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'subcategory';
        $this->resource = 'subcategories';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        $categories = auth('vendor')->user()->categories()->where('active', 1)->get();
        return parent::VendorIndexBase($this->resource, 'dashboard.subcategories.index', vars: ['categories' => $categories], with: ['category'], searchable: ['name_en', 'name_ar']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'category_id', 'avatar'], $this->createSubcategoryRules(), [
            'table' => 'vendor_subcategories',
            'foreign' => 'subcategory',
            'related' => 'vendor',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'category_id', 'avatar'], $this->updateSubcategoryRules(), $id, [
            'table' => 'vendor_subcategories',
            'foreign' => 'subcategory',
            'related' => 'vendor',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
