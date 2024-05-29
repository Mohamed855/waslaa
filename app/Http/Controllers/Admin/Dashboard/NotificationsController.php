<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Admin\BaseController;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NotificationsController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $resource;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'notification';
        $this->resource = 'notifications';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        $notificationsIndexView = 'dashboard.notifications.index';
        $searchable = ['name_en', 'name_ar'];

        if (auth('admin')->check()) {
            return parent::indexBase($this->table, $notificationsIndexView, specialRecords: ['type' => 'admin'], searchable: $searchable);
        } else {
            return parent::VendorIndexBase($this->resource, $notificationsIndexView, searchable: $searchable);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return parent::storeBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'body_en', 'body_ar', 'image', 'type', 'user_id'], $this->createNotificationRules(), redirectToIndex: true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return parent::updateBase($this->table, $this->resource, $request, ['name_en', 'name_ar', 'body_en', 'body_ar', 'image'], $this->updateNotificationRules($id), $id, redirectToIndex: true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
