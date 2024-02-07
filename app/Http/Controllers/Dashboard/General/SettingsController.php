<?php

namespace App\Http\Controllers\Dashboard\General;

use App\Http\Controllers\Controller;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    use QueriesTrait, AdminRules;

    public function settings()
    {
        //
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        try {
            $hero = $this->siteOption()->where('key', 'hero')->first();
            $whoAreWe = $this->siteOption()->where('key', 'whoAreWe')->first();

            $data = $request->all();

            $validator = Validator::make($data, $this->settingsRules());

            if ($validator->fails()) return back()->with('error', $validator->errors()->first());

            if ($request['hero']) {
                if ($hero->value != null) {
                    Storage::delete('public/' . $hero->value);
                }
                $heroName = 'hero' . '-' . time() . '.' . $data['hero']->extension();
                $data['hero']->storeAs('public/images/global', $heroName);
                $data['hero'] = 'images/global/' . $heroName;

                $hero->update(['value' => $data['hero']]);
            }

            $whoAreWe->update(['value' => $data['whoAreWe']]);

            return redirect()->route('settings')->with('success', __('translate.settings') . ' ' . __('success.updated'));
        } catch (Exception) {
            return back()->with('error', __('error.somethingWentWrong'));
        }
    }
}
