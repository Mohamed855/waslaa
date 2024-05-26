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
     * Display a listing of the ordered orders.
     */
    public function ordered(): View|RedirectResponse
    {
        $data = $this->order()->where('status', 'ordered')->with(['user'])->paginate(10);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.orders.ordered', compact('data'));
    }

    /**
     * Display a listing of the accepted orders.
     */
    public function accepted(): View|RedirectResponse
    {
        $data = $this->order()->where('status', 'accepted')->with(['user'])->paginate(10);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.orders.accepted', compact('data'));
    }

    /**
     * Display a listing of the canceled orders.
     */
    public function canceled(): View|RedirectResponse
    {
        $data = $this->order()->where('status', 'canceled')->with(['user'])->paginate(10);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('dashboard.orders.canceled', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $guard = DashboardHelper::getCurrentGuard();
        return parent::showBase($this->table, 'dashboard.orders.show', $id, vars: ['guard' => $guard]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->resource, $id);
    }
}
