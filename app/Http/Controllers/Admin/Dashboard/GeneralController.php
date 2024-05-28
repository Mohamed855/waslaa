<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use App\Helpers\DashboardHelper;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    use QueriesTrait, AdminRules;

    public function __construct()
    {
        $this->middleware('guard:admin')->only(['adminOverview']);
        $this->middleware('guard:vendor')->only(['vendorOverview']);
    }

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
        return view('dashboard.general.admin-overview', compact(['adminsCount', 'vendorsCount', 'usersCount', 'activeAdminsCount', 'activeUsersCount', 'activeVendors']));
    }

    public function vendorOverview(): View
    {
        $currVendor = auth('vendor')->user()->with(['managers', 'users', 'categories', 'subcategories' => function ($query) {
            $query->with(['products']);
        }])->first();
        return view('dashboard.general.vendor-overview', compact(['currVendor']));
    }

    public function profile(): View
    {
        $guard = DashboardHelper::getCurrentGuard();
        $authUser = auth($guard)->user();
        return view('dashboard.general.profile', compact(['guard', 'authUser']));
    }

    public function settings(): View
    {
        $settings = $this->siteOption()->get();
        return view('dashboard.general.settings', compact(['settings']));
    }
}
