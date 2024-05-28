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

class ComplainsController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $resource;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'complain';
        $this->resource = 'complains';
        $this->middleware('guard:vendor')->only(['store', 'update', 'destroy']);
    }

    /**
     * Display a listing of complains.
     */
    public function index(): View|RedirectResponse
    {
        $vars = auth('vendor')->check() ?  ['users' => auth('vendor')->user()->users] : [];
        return parent::indexBase($this->table, 'dashboard.complains.index', searchable: ['title', 'body'], vars: $vars);
    }

    /**
     * Display a listing of the users' complains.
     */
    public function userComplains(string $username): View|RedirectResponse
    {
        $user = DashboardHelper::getUserByUsername($username);
        $data = DashboardHelper::returnDataOnPagination($user->complains());
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.complains.index', compact(['data', 'username']))->with(['selectedUserId' => $user->id]);
    }

    /**
     * Display a listing of the vendors' complains.
     */
    public function vendorComplains(string $username): View|RedirectResponse
    {
        $vendor = DashboardHelper::getVendorByUsername($username);
        $data = DashboardHelper::returnDataOnPagination($vendor->complains());
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.complains.index', compact(['data', 'username']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->resource, $request, ['vendor_id', 'user_id', 'title', 'body', 'image'], $this->createComplainRules());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->resource, $request, ['user_id', 'title', 'body', 'image'], $this->updateComplainRules($id), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
