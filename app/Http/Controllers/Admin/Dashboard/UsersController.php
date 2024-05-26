<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Helpers\DashboardHelper;
use App\Http\Controllers\Admin\BaseController;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UsersController extends BaseController
{
    use QueriesTrait;

    private string $table, $resource;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'user';
        $this->resource = 'users';
        $this->middleware('guard:admin')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        $usersIndexView = 'dashboard.users.index';
        $with = ['city'];
        $searchable = ['name', 'username', 'phone', 'sec_phone'];

        if (auth('admin')->check()) {
            return parent::indexBase($this->table, $usersIndexView, with: $with, searchable: $searchable);
        } else {
            return parent::VendorIndexBase($this->resource, $usersIndexView, with: $with, searchable: $searchable);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $singleUserView = 'dashboard.users.show';
        $with = ['city', 'favoriteVendors', 'vendors', 'complains' => function ($query) {
            $query->with('vendor');
        }];

        if (auth('admin')->check()) {
            return parent::showBase($this->table, $singleUserView, $id, with: $with);
        } else {
            return parent::vendorShowBase('users', $singleUserView, $id, with: $with);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
