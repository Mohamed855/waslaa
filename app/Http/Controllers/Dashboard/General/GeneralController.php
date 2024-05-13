<?php

namespace App\Http\Controllers\Dashboard\General;

use App\Http\Controllers\Controller;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;

class GeneralController extends Controller
{
    use QueriesTrait, AdminRules;

    public function adminOverview(): View
    {
        $adminsCount = $this->admin()->count();
        $vendorsCount = $this->vendor()->count();
        $usersCount = $this->user()->count();
        $activeAdminsCount = $this->activeAdmin()->count();
        $activeUsersCount = $this->activeUser()->count();
        $activeVendors = $this->activeVendor()->with(['managers', 'users', 'categories', 'subcategories' => function ($query) {
            $query->with(['products']);
        }])->get();
        return view('dashboard.main.admin-overview', compact(['adminsCount', 'vendorsCount', 'usersCount', 'activeAdminsCount', 'activeUsersCount', 'activeVendors']));
    }

    public function vendorOverview(): View
    {
        $adminsCount = $this->admin()->count();
        $vendorsCount = $this->vendor()->count();
        $usersCount = $this->user()->count();
        $activeAdminsCount = $this->activeAdmin()->count();
        $activeUsersCount = $this->activeUser()->count();
        $activeVendors = $this->activeVendor()->with(['managers', 'users', 'categories', 'subcategories' => function ($query) {
            $query->with(['products']);
        }])->get();
        return view('dashboard.main.vendor-overview', compact(['adminsCount', 'vendorsCount', 'usersCount', 'activeAdminsCount', 'activeUsersCount', 'activeVendors']));
    }

    public function settings(): View
    {
        $settings = $this->siteOption()->get();
        return view('dashboard.general.settings', compact(['settings']));
    }
}
