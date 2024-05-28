<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Helpers\DashboardHelper;
use App\Http\Controllers\Admin\BaseController;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
