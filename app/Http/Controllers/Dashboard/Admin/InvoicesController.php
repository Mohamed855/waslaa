<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Helpers\DashboardHelper;
use App\Http\Controllers\Dashboard\BaseController;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class InvoicesController extends BaseController
{
    use QueriesTrait;

    private string $table, $folder;
    public function __construct()
    {
        $this->table = 'invoice';
        $this->folder = 'invoices';
    }

    /**
     * Display a listing of the opened invoices.
     */
    public function opened(): View|RedirectResponse
    {
        $data = $this->invoice()->where('status', 'opened')->with(['_vendor'])->paginate(10);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('admin.invoices.opened', compact('data'));
    }

    /**
     * Display a listing of the closed invoices.
     */
    public function closed(): View|RedirectResponse
    {
        $data = $this->invoice()->where('status', 'closed')->with(['_vendor'])->paginate(10);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('admin.invoices.closed', compact('data'));
    }

    /**
     * Display a listing of the collected invoices.
     */
    public function collected(): View|RedirectResponse
    {
        $data = $this->invoice()->where('status', 'collected')->with(['_vendor'])->paginate(10);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view('admin.invoices.collected', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $guard = DashboardHelper::getCurrentGuard();
        return parent::showBase($this->table, 'admin.invoices.show', $id, vars: ['guard' => $guard], with: ['_orders']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->folder, $id);
    }
}
