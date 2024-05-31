<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Traits\QueriesTrait;
use Illuminate\Http\Request;
use App\Helpers\DashboardHelper;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Admin\BaseController;

class InvoicesController extends BaseController
{
    use QueriesTrait;

    private string $table, $resource;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'invoice';
        $this->resource = 'invoices';
    }

    /**
     * Display a listing of invoices.
     */
    public function index($status): View|RedirectResponse
    {
        $data = auth('admin')->check() ? $this->invoice() : auth('vendor')->user()->invoices();
        $data = $data->where('status', $status)->with(['vendor']);
        $data = DashboardHelper::returnDataOnPagination($data);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.invoices.index', compact(['data', 'status']));
    }

    /**
     * Display a listing of the vendors' invoices.
     */
    public function vendorInvoices(string $username): View|RedirectResponse
    {
        $vendor = DashboardHelper::getVendorByUsername($username);
        $data = DashboardHelper::returnDataOnPagination($vendor->invoices()->orderBy('status'));
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.invoices.index', compact(['data', 'username']));
    }

    /**
     * Display a listing of the opened invoices.
     */
    public function opened(): View|RedirectResponse
    {
        return $this->index('opened');
    }

    /**
     * Display a listing of the closed invoices.
     */
    public function closed(): View|RedirectResponse
    {
        return $this->index('closed');
    }

    /**
     * Display a listing of the collected invoices.
     */
    public function collected(): View|RedirectResponse
    {
        return $this->index('collected');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        return parent::showBase($this->table, 'dashboard.invoices.show', $id);
    }

    public function updateInvoiceStatus($status, $id) {
        $request = new Request();
        $request['status'] = $status;
        return parent::updateBase($this->table, $this->resource, $request, ['status'], ['status' => 'in:closed,collected'], $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
