<?php

namespace App\Http\Controllers\Dashboard\General;

use App\Http\Controllers\Dashboard\BaseController;
use App\Traits\QueriesTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UsersController extends BaseController
{
    use QueriesTrait;

    private string $table, $folder;
    public function __construct()
    {
        $this->table = 'user';
        $this->folder = 'users';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        return parent::indexBase($this->table, 'general.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        return parent::showBase($this->table, 'general.users.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return parent::destroyBase($this->table, $this->folder, $id);
    }
}
