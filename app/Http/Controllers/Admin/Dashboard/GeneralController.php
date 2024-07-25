<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Illuminate\Http\Request;
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

    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        $SERVER_API_KEY = 'AAAAyzXj8Ts:APA91bH4tymiYFKKZsCvAAMThBRSHmZcVGWdyHbLVndmCoq5KeGSGvQL73yot32D3gLML2MtszTh1okBDdSj21z70qRWTwqyBSzjVPmSx7WYx508UvX3FToT0KZI34kmC8fQfViwGih4';
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        dd($response);
    }
}
