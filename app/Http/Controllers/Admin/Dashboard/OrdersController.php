<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Helpers\DashboardHelper;
use App\Http\Controllers\Admin\BaseController;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrdersController extends BaseController
{
    use QueriesTrait;

    private string $table, $resource;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'order';
        $this->resource = 'orders';
    }

    /**
     * Display a listing of orders.
     */
    public function index($status): View|RedirectResponse
    {
        $data = auth('admin')->check() ? $this->order() : auth('vendor')->user()->currVendorOrders();
        $data = $data->where('status', $status)->with(['user']);
        $data = DashboardHelper::returnDataOnPagination($data);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.orders.index', compact(['data', 'status']));
    }

    /**
     * Display a listing of the ordered orders.
     */
    public function ordered(): View|RedirectResponse
    {
        return $this->index('ordered');
    }

    /**
     * Display a listing of the accepted orders.
     */
    public function accepted(): View|RedirectResponse
    {
        return $this->index('accepted');
    }

    /**
     * Display a listing of the canceled orders.
     */
    public function canceled(): View|RedirectResponse
    {
        return $this->index('canceled');
    }

    /**
     * Display a listing of the users' orders.
     */
    public function userOrders(string $username): View|RedirectResponse
    {
        $user = DashboardHelper::getUserByUsername($username);
        $data = auth('admin')->check() ? $user->orders() : $user->currVendorOrders();
        $data = DashboardHelper::returnDataOnPagination($data->orderBy('status'));
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.orders.index', compact(['data', 'username']));
    }

    /**
     * Display a listing of the vendors' orders.
     */
    public function vendorOrders(string $username): View|RedirectResponse
    {
        $vendor = DashboardHelper::getVendorByUsername($username);
        $data = DashboardHelper::returnDataOnPagination($vendor->orders($vendor->id)->orderBy('status'));
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.orders.index', compact(['data', 'username']));
    }

    /**
     * Display a listing of the invoices' orders.
     */
    public function invoiceOrders(string $id): View|RedirectResponse
    {
        $invoice = $this->invoice()->findOrFail($id);
        $data = DashboardHelper::returnDataOnPagination($invoice->orders());
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.orders.index', compact(['data']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        return parent::showBase($this->table, 'dashboard.orders.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
