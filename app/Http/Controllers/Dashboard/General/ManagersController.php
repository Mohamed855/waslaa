<?php

namespace App\Http\Controllers\Dashboard\General;

use App\Http\Controllers\Dashboard\BaseController;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ManagersController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $folder;
    public function __construct()
    {
        $this->table = 'manager';
        $this->folder = 'managers';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        return parent::indexBase($this->table, 'admin.managers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return parent::createBase('admin.managers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->folder, $request, ['added_by', 'name', 'email', 'phone', 'password', 'avatar'], $this->createManagerRules());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->folder, $request, ['name', 'username', 'email', 'phone', 'avatar'], $this->updateManagerRules($id), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->folder, $id);
    }
}
