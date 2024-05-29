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

class ComponentsController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $resource;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'component';
        $this->resource = 'components';
        $this->middleware('guard:vendor')->only('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        return parent::vendorIndexBase($this->resource, 'dashboard.components.index', vars: ['vendorId' => auth('vendor')->id()], searchable: ['name_en', 'name_ar']);
    }

    /**
     * Display a listing of the vendors' components.
     */
    public function vendorComponents(string $username): View|RedirectResponse
    {
        $vendor = DashboardHelper::getVendorByUsername($username);
        $vendorId = $vendor->id;
        $data = DashboardHelper::returnDataOnPagination($vendor->components());
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.components.index', compact(['data', 'username', 'vendorId']))->with(['nameOnLang' => $this->nameOnLang]);
    }

    /**
     * Display a listing of the products' components.
     */
    public function productComponents(string $id): View|RedirectResponse
    {
        $product = $this->product()->findOrFail($id);
        $vendor = auth('vendor')->check() ? auth('vendor')->user() : $product->vendor();
        $data = DashboardHelper::returnDataOnPagination($product->components());
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.components.index', compact(['data']))->with(['components' => $vendor->components()->get(), 'selectedProductComponents' => $product->components(), 'nameOnLang' => $this->nameOnLang, 'productId' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'vendor_id'], $this->createComponentRules());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->resource, $request, ['name_en', 'name_ar'], $this->updateComponentRules($id), $id);
    }

    public function selectProductComponent(Request $request): RedirectResponse
    {
        $productId = $request->product_id;
        DB::table('product_components')->where('product_id', $productId)->delete();
        foreach (explode(',', $request['components'][0]) as $component) {
            DB::table('product_components')->insert([
                'component_id' => $component,
                'product_id' => $productId
            ]);
        }
        return back()->with('success', __('translate.' . $this->table) . ' ' . __('success.added'));
    }

    public function removeProductComponent(string $id, $productId): RedirectResponse
    {
        DB::table('product_components')->where(['product_id' => $productId, 'component_id' => $id])->delete();
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
