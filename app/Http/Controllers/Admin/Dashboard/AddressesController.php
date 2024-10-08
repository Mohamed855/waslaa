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

class AddressesController extends BaseController
{
    use QueriesTrait, AdminRules;

    private string $table, $resource;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'address';
        $this->resource = 'addresses';
    }

    /**
     * Display a listing of the vendors' addresses.
     */
    public function vendorBranches(string $username): View|RedirectResponse
    {
        $vendor = DashboardHelper::getVendorByUsername($username);
        $cities = $this->activeCity()->get();
        $data = DashboardHelper::returnDataOnPagination($vendor->addresses());
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.addresses.index', compact(['data', 'cities', 'username']))->with(['selectedVendorId' => $vendor->id, 'nameOnLang' => $this->nameOnLang]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request = $this->setMain($request);
        return parent::storeBase($this->table, $this->resource, $request, ['type', 'user_id', 'city_id', 'address', 'main'], $this->createAddressRules());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request = $this->setMain($request);
        return parent::updateBase($this->table, $this->resource, $request, ['city_id', 'address', 'main'], $this->updateAddressRules($id), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }

    private function setMain($request) {
        $vendor = $this->vendor()->find($request->user_id);
        $vendorBranches = $vendor->addresses()->get();
        if ($vendorBranches && count($vendorBranches) > 0) {
            if ($request->main) {
                foreach ($vendorBranches as $address) {
                    if ($address->main) {
                        $address->update(['main' => 0]);
                    }
                }
                $request->main = 1;
            } else {
                $request->main = 0;
            }
        } else {
            $request->main = 1;
        }
        return $request;
    }
}
