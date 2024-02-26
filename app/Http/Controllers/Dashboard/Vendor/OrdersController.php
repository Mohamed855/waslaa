<?php

namespace App\Http\Controllers\Dashboard\Vendor;

use App\Helpers\DashboardHelper;
use App\Http\Controllers\Dashboard\BaseController;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrdersController extends BaseController
{
    use QueriesTrait;

    private string $table, $folder;
    public function __construct()
    {
        $this->table = 'order';
        $this->folder = 'orders';
    }

    /**
     * Display a listing of the ordered orders.
     */
    public function ordered(): View|RedirectResponse
    {
        $data = $this->order()->where('status', 'ordered')->with(['_user'])->paginate(10);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('general.orders.ordered', compact('data'));
    }

    /**
     * Display a listing of the accepted orders.
     */
    public function accepted(): View|RedirectResponse
    {
        $data = $this->order()->where('status', 'accepted')->with(['_user'])->paginate(10);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('general.orders.accepted', compact('data'));
    }

    /**
     * Display a listing of the canceled orders.
     */
    public function canceled(): View|RedirectResponse
    {
        $data = $this->order()->where('status', 'canceled')->with(['_user'])->paginate(10);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('general.orders.canceled', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $guard = DashboardHelper::getCurrentGuard();
        return parent::showBase($this->table, 'general.orders.show', $id, vars: ['guard' => $guard]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->folder, $id);
    }
}
