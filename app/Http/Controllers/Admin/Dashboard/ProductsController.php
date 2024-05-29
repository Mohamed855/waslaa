<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Helpers\Helper;
use App\Models\Product;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Http\Request;
use App\Helpers\DashboardHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Admin\BaseController;

class ProductsController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $resource;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'product';
        $this->resource = 'products';
        $this->middleware('guard:vendor')->only(['index', 'create', 'store', 'edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        $data = Product::vendorProducts();
        if(isset($_GET['keyword'])) {
            $searchable = ['name_en', 'name_ar'];
            $data = Helper::searchOnQuery($data, $searchable, $_GET['keyword']);
        }
        $data = DashboardHelper::returnDataOnPagination($data);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.products.index', compact(['data']))->with(['nameOnLang' => $this->nameOnLang]);
    }

    /**
     * Display a listing of the orders' products.
     */
    public function orderProducts(string $id): View|RedirectResponse
    {
        $order = $this->order()->findOrFail($id);
        return view('dashboard.products.index', compact(['order']))->with(['data' => $order->products]);
    }

    /**
     * Display a listing of the vendors' products.
     */
    public function vendorProducts(string $username): View|RedirectResponse
    {
        $vendor = DashboardHelper::getVendorByUsername($username);
        $data = DashboardHelper::returnDataOnPagination($vendor->products());
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.products.index', compact(['data', 'username']))->with(['nameOnLang' => $this->nameOnLang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = auth('vendor')->user()->categories()->where('active', 1)->get();
        $components = auth('vendor')->user()->components()->where('active', 1)->get();
        $types = auth('vendor')->user()->types()->where('active', 1)->get();
        return parent::createBase('dashboard.products.create', vars: ['nameOnLang' => $this->nameOnLang, 'categories' => $categories, 'components' => $components, 'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'subcategory_id', 'avatar'], $this->createProductRules(), [
            'table' => ['product_components', 'product_types'],
            'foreign' => ['product', 'product'],
            'related' => ['component', 'type'],
        ], redirectToIndex: true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        if (auth('vendor')->check()) {
            $categories = auth('vendor')->user()->categories()->where('active', 1)->get();
            $components = auth('vendor')->user()->components()->where('active', 1)->get();
            $types = auth('vendor')->user()->types()->where('active', 1)->get();
            $vars = ['nameOnLang' => $this->nameOnLang, 'categories' => $categories, 'components' => $components, 'types' => $types];
        } else {
            $vars = [];
        }
        return parent::showBase($this->table, 'dashboard.products.show', $id, vars: $vars);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'subcategory_id', 'avatar'], $this->updateProductRules($id), $id, [
            'table' => ['product_components', 'product_types'],
            'foreign' => ['product', 'product'],
            'related' => ['component', 'type']
        ]);
    }

    public function updateOffer(Request $request, $id)
    {
        $request['offer'] = true;
        return parent::updateBase($this->table, $this->resource, $request, ['offer', 'offer_type', 'offer_value'], $this->updateOfferRules($id), $id);
    }

    public function removeOffer($id) {
        $request = new Request();
        $request['offer'] = false;
        $request['offer_type'] = null;
        $request['offer_value'] = 0;
        return parent::updateBase($this->table, $this->resource, $request, ['offer', 'offer_type', 'offer_value'], [], $id);
    }

    public function updatePrices($id) {
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }

    public function getCurrVendorSubCategories ($catId)
    {
        $subcategories = auth('vendor')->user()->subcategories()->where(['category_id' => $catId, 'active' => 1])->get();
        return response()->json($subcategories);
    }
}
