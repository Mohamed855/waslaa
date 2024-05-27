<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{
    public $nameOnLang;
    public function __construct() {
        $this->nameOnLang = Helper::getColumnOnLang('name');
    }

    /**
     * Display a listing of the resource.
     */
    protected function indexBase($table, $view, $specialRecords = [], $vars = [], $with = [], $searchable = []): View|RedirectResponse
    {
        $data = $this->$table()->where($specialRecords)->with($with);
        if(isset($_GET['keyword']) && count($searchable) > 0) {
            $data = Helper::searchOnQuery($data, $searchable, $_GET['keyword']);
        }
        $data = $data->paginate(10);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view($view, compact(['data']))->with(['nameOnLang' => $this->nameOnLang] + $vars);
    }

    /**
     * Display a listing of the resource with vendors relation.
     */
    protected function VendorIndexBase($relation, $view, $vars = [], $with = [], $searchable = []): View|RedirectResponse
    {
        $data = auth('vendor')->user()->$relation()->with($with);
        if(isset($_GET['keyword']) && count($searchable) > 0) {
            $data = Helper::searchOnQuery($data, $searchable, $_GET['keyword']);
        }
        $data = $data->paginate(10);
        if ($data->currentPage() > $data->lastPage()) return redirect($data->url($data->lastPage()));
        return view($view, compact(['data']))->with(['nameOnLang' => $this->nameOnLang] + $vars);
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
    protected function storeBase($table, $resource, Request $request, array $storedData, array $rules, $manyToMany = [], $redirectToIndex = false): RedirectResponse
    {
        try{
            if (isset($request['phone']) && $request['phone'] != null) {
                $request['phone'] = Helper::correctPhoneStyle($request['phone']);
            }

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) return back()->with('error', $validator->errors()->first());

            $data = $request->only($storedData);

            if (isset($data['phone']) && $request['phone'] != null) {
                $data['phone'] = Helper::correctPhoneStyle($request['phone']);
            }

            if ($request['avatar']) {
                $imageName = time() . '.' . $data['avatar']->extension();
                $request['avatar']->storeAs('public/images/' . $resource, $imageName);
                $data['avatar'] = $imageName;
            }

            if ($request['image']) {
                $imageName = time() . '.' . $data['image']->extension();
                $request['image']->storeAs('public/images/' . $resource, $imageName);
                $data['image'] = $imageName;
            }

            $newEle = $this->$table()->create($data);

            if ($manyToMany != []) {
                if (is_array($manyToMany['table'])) {
                    for($i = 0; $i < count($manyToMany['table']); $i++) {
                        foreach (explode(',', $request[$manyToMany['related'][$i]][0]) as $related) {
                            DB::table($manyToMany['table'][$i])->insert([
                                $manyToMany['related'][$i] . '_id' => $related,
                                $manyToMany['foreign'][$i] . '_id' => $newEle['id']
                            ]);
                        }
                    }
                } else {
                    foreach (explode(',', $request[$manyToMany['related']][0]) as $related) {
                        DB::table($manyToMany['table'])->insert([
                            $manyToMany['related'] . '_id' => $related,
                            $manyToMany['foreign'] . '_id' => $newEle['id']
                        ]);
                    }
                }
            }
            $redirect = $redirectToIndex ? redirect()->route($resource . '.index') : back();
            return $redirect->with('success', __('translate.' . $table) . ' ' . __('success.added'));
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function showBase($table, $view, string $id, $vars = [], $with = []): View
    {
        $selected = $this->$table()->with($with)->findOrFail($id);
        return view($view, compact(['selected']))->with(['nameOnLang' => $this->nameOnLang] + $vars);
    }

    /**
     * Display the specified resource with vendors relation.
     */
    public function vendorShowBase($relation, $view, string $id, $vars = [], $with = []): View
    {
        $selected = auth('vendor')->user()->$relation()->with($with)->findOrFail($id);
        return view($view, compact(['selected']))->with(['nameOnLang' => $this->nameOnLang] + $vars);
    }

    /**
     * Show the form for editing the specified resource.
     */
    protected function editBase($table, $view, string $id, $vars = []): View
    {
        $selected = $this->$table()->findOrFail($id);
        if ($selected['is_primary']) abort(404);
        return view($view, compact(['selected']))->with(['nameOnLang' => $this->nameOnLang] + $vars);
    }

    /**
     * Show the form for editing the specified resource with vendors relation.
     */
    public function vendorEditBase($relation, $view, string $id, $vars = []): View
    {
        $selected = auth('vendor')->user()->$relation()->findOrFail($id);
        return view($view, compact(['selected']))->with(['nameOnLang' => $this->nameOnLang] + $vars);
    }

    /**
     * Update the specified resource in storage.
     */
    protected function updateBase($table, $resource, Request $request, array $storedData, array $rules, string $id, array $manyToMany = [], $redirectToIndex = false): RedirectResponse
    {
        //dd($request);
        try {
            $selected = $this->$table()->find($id);
            if (auth('admin')->id() != $id && $selected['is_primary']) back()->with('error', __('error.cannotEditPrimary'));

            if (isset($request['phone']) && $request['phone'] != null) {
                $request['phone'] = Helper::correctPhoneStyle($request['phone']);
            }

            if ($request['password']) {
                $storedData['password'] = $request['password'];
            }

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) return back()->with('error', $validator->errors()->first());

            $data = $request->only($storedData);

            if (isset($data['phone']) && $request['phone'] != null) {
                $data['phone'] = Helper::correctPhoneStyle($request['phone']);
            }

            if ($request['username']) {
                $data['username'] = strtolower($data['username']);
            }

            if ($request['avatar']) {
                if ($selected['avatar'] != null) {
                    Storage::delete('public/images/' . $resource . '/' . $selected['avatar']);
                }
                $imageName = time() . '.' . $data['avatar']->extension();
                $request['avatar']->storeAs('public/images/' . $resource, $imageName);
                $data['avatar'] = $imageName;
            }

            if ($request['image']) {
                if ($selected['image'] != null) {
                    Storage::delete('public/images/' . $resource . '/' . $selected['image']);
                }
                $imageName = time() . '.' . $data['image']->extension();
                $request['image']->storeAs('public/images/' . $resource, $imageName);
                $data['image'] = $imageName;
            }

            if ($request['password']) {
                $data['password'] = $request['password'];
            }

            $selected->update($data);

            if ($manyToMany != []) {
                if (is_array($manyToMany['table'])) {
                    for($i = 0; $i < count($manyToMany['table']); $i++) {
                        DB::table($manyToMany['table'][$i])->where($manyToMany['foreign'][$i] . '_id', $id)->delete();
                        foreach (explode(',', $request[$manyToMany['related'][$i]][0]) as $related) {
                            DB::table($manyToMany['table'][$i])->insert([
                                $manyToMany['related'][$i] . '_id' => $related,
                                $manyToMany['foreign'][$i] . '_id' => $id
                            ]);
                        }
                    }
                } else {
                    DB::table($manyToMany['table'])->where($manyToMany['foreign'] . '_id', $id)->delete();
                    foreach (explode(',', $request[$manyToMany['related']][0]) as $related) {
                        DB::table($manyToMany['table'])->insert([
                            $manyToMany['related'] . '_id' => $related,
                            $manyToMany['foreign'] . '_id' => $id
                        ]);
                    }
                }
            }

            $redirect = $redirectToIndex ? redirect()->route($resource . '.index') : back();
            return $redirect->with('success', __('translate.' . $table) . ' ' . __('success.updated'));
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    protected function destroyBase($table, $resource, string $id): RedirectResponse
    {
        try {
            $selected = $this->$table()->find($id);
            if ($selected['is_primary']) return back()->with('error', __('error.cannotDeletePrimary'));

            if ($selected['avatar'] != null) {
                Storage::delete('public/images/' . $resource . '/' . $selected['avatar']);
            }

            if ($selected['image'] != null) {
                Storage::delete('public/images/' . $resource . '/' . $selected['image']);
            }

            $selected->delete();
            return back()->with('success', __('translate.' . $table) . ' ' . __('success.deleted'));
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
