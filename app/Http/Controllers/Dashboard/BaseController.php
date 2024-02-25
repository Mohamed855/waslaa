<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    protected function indexBase($table, $view, $vars = [], $with = []): View|RedirectResponse
    {
        $data = $this->$table()->with($with)->paginate(10);
        $nameOnLang = Helper::getColumnOnLang('name');
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view($view, compact(['data', 'nameOnLang']))->with($vars);
    }

    /**
     * Show the form for creating a new resource.
     */
    protected function createBase($view, $vars = []): View
    {
        return view($view)->with($vars);
    }

    /**
     * Store a newly created resource in storage.
     */
    protected function storeBase($table, $folder, Request $request, array $storedData, array $rules): RedirectResponse
    {
        try {
            if ($request['phone']) {
                $request['phone'] = Helper::correctPhoneStyle($request['phone']);
            }

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) return back()->with('error', $validator->errors()->first());

            $data = $request->only($storedData);

            if ($request['avatar']) {
                $imageName = time() . '.' . $data['avatar']->extension();
                $data['avatar']->storeAs('public/images/' . $folder, $imageName);
                $data['avatar'] = $imageName;
            }

            if ($request['image']) {
                $imageName = time() . '.' . $data['image']->extension();
                $data['image']->storeAs('public/images/' . $folder, $imageName);
                $data['image'] = $imageName;
            }

            $this->$table()->create($data);

            return back()->with('success', __('translate.' . $table) . ' ' . __('success.added'));
        } catch (Exception) {
            return back()->with('error', __('error.somethingWentWrong'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function showBase($table, $view, string $id, $vars = [], $with = []): View
    {
        $selected = $this->$table()->with($with)->findOrFail($id);
        $nameOnLang = Helper::getColumnOnLang('name');
        return view($view, compact(['selected', 'nameOnLang']))->with($vars);
    }

    /**
     * Show the form for editing the specified resource.
     */
    protected function editBase($table, $view, string $id, $vars = []): View
    {
        $selected = $this->$table()->findOrFail($id);
        if ($selected['is_primary']) abort(404);
        return view($view, compact('selected'))->with($vars);
    }

    /**
     * Update the specified resource in storage.
     */
    protected function updateBase($table, $folder, Request $request, array $storedData, array $rules, string $id): RedirectResponse
    {
        try {
            $selected = $this->$table()->find($id);
            if (auth('admin')->id() != $id && $selected['is_primary']) back()->with('error', __('error.cannotEditPrimary'));

            if ($request['phone']) {
                $request['phone'] = Helper::correctPhoneStyle($request['phone']);
            }

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) return back()->with('error', $validator->errors()->first());

            $data = $request->only($storedData);

            if ($data['username']) {
                $data['username'] = strtolower($data['username']);
            }

            if ($request['avatar']) {
                if ($selected['avatar'] != null) {
                    Storage::delete('public/images/' . $folder . '/' . $selected['avatar']);
                }
                $imageName = time() . '.' . $data['avatar']->extension();
                $data['avatar']->storeAs('public/images/' . $folder, $imageName);
                $data['avatar'] = $imageName;
            }

            if ($request['image']) {
                if ($selected['image'] != null) {
                    Storage::delete('public/images/' . $folder . '/' . $selected['image']);
                }
                $imageName = time() . '.' . $data['image']->extension();
                $data['image']->storeAs('public/images/' . $folder, $imageName);
                $data['image'] = $imageName;
            }

            if ($request['password']) {
                $data['password'] = $request['password'];
            }

            $selected->update($data);

            return back()->with('success', __('translate.' . $table) . ' ' . __('success.updated'));
        } catch (Exception) {
            return back()->with('error', __('error.somethingWentWrong'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    protected function destroyBase($table, $folder, string $id): RedirectResponse
    {
        try {
            $selected = $this->$table()->find($id);
            if ($selected['is_primary']) return back()->with('error', __('error.cannotDeletePrimary'));

            if ($selected['avatar'] != null) {
                Storage::delete('public/images/' . $folder . '/' . $selected['avatar']);
            }

            if ($selected['image'] != null) {
                Storage::delete('public/images/' . $folder . '/' . $selected['image']);
            }

            $selected->delete();
            return back()->with('success', __('translate.' . $table) . ' ' . __('success.deleted'));
        } catch (Exception) {
            return back()->with('error', __('error.somethingWentWrong'));
        }
    }
}
