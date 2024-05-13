<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Dashboard\BaseController;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NotificationsController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $folder;
    public function __construct()
    {
        $this->table = 'notification';
        $this->folder = 'notifications';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        return parent::indexBase($this->table, 'dashboard.notifications.index', searchable: ['name_en', 'name_ar']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return parent::createBase('dashboard.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->folder, $request, ['name_en', 'name_ar', 'body_en', 'body_ar', 'image'], $this->notificationRules());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return parent::editBase($this->table, 'dashboard.notifications.edit', $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->folder, $request, ['name_en', 'name_ar', 'body_en', 'body_ar', 'image'], $this->notificationRules(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->folder, $id);
    }
}
