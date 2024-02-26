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
        return parent::indexBase($this->table, 'admin.vendors.index', with: ['_admin', '_favorites', '_city'], searchable: ['name', 'owner_name', 'username', 'crn', 'email', 'phone']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $nameOnLang = Helper::getColumnOnLang('name');
        $cities = $this->activeCity()->get(['id', $nameOnLang . ' as name']);
        return parent::createBase('admin.vendors.create', vars: ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->folder, $request, ['added_by', 'name', 'owner_name', 'crn', 'email', 'phone', 'password', 'city', 'delivery_time', 'delivery_cost', 'avatar'], $this->createVendorRules());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $nameOnLang = Helper::getColumnOnLang('name');
        $cities = $this->activeCity()->get(['id', $nameOnLang . ' as name']);
        return parent::showBase($this->table, 'admin.vendors.show', $id, vars: ['cities' => $cities], with: ['_favorites', '_city', '_managers' => function($query) {
            if(isset($_GET['keyword'])) $query = Helper::searchOnQuery($query, ['name', 'username', 'email', 'phone'], $_GET['keyword']);
            $query->paginate(10);
        }]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->folder, $request, ['name', 'username', 'owner_name', 'crn', 'email', 'phone', 'city', 'delivery_time', 'delivery_cost', 'priority', 'lang'], $this->updateVendorRules($id), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->folder, $id);
    }
}
