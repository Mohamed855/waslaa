<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Admin\BaseController;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminsController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $resource;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'admin';
        $this->resource = 'admins';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        return parent::indexBase($this->table, 'dashboard.admins.index', searchable: ['name', 'username', 'email', 'phone']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->resource, $request, ['name', 'email', 'phone', 'password', 'avatar'], $this->createAdminRules(), redirectToIndex: true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $admin = $this->admin()->find($id);
        if ($admin->email == 'admin@test.com' || $admin->email == 'wasla@owner.com') return back()->with('error', __('error.cannotUpdateMainAdmin'));
        return parent::updateBase($this->table, $this->resource, $request, ['name', 'username', 'email', 'phone', 'avatar'], $this->updateAdminRules($id), $id, redirectToIndex: true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $admin = $this->admin()->find($id);
        if ($admin->email == 'admin@test.com' || $admin->email == 'wasla@owner.com') return back()->with('error', __('error.cannotDeleteMainAdmin'));
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
