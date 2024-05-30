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
        $activeVendors = $this->activeVendor()->get();
        return view('dashboard.general.admin-overview', compact(['adminsCount', 'vendorsCount', 'usersCount', 'activeAdminsCount', 'activeUsersCount', 'activeVendors']));
    }

    public function vendorOverview(): View
    {
        $managersCount = auth('vendor')->user()->managers()->count();
        $usersCount = auth('vendor')->user()->users()->count();
        $categoriesCount = auth('vendor')->user()->categories()->count();
        $subcategoriesCount = auth('vendor')->user()->subcategories()->count();
        $productsCount = auth('vendor')->user()->products()->count();
        $componentsCount = auth('vendor')->user()->components()->count();
        $typesCount = auth('vendor')->user()->types()->count();
        $orders = auth('vendor')->user()->currVendorOrders()->get();
        $invoices = auth('vendor')->user()->invoices()->get();
        return view('dashboard.general.vendor-overview', compact(['managersCount', 'usersCount', 'categoriesCount', 'subcategoriesCount', 'productsCount', 'componentsCount', 'typesCount', 'orders', 'invoices']));
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
