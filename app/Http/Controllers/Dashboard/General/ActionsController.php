<?php

namespace App\Http\Controllers\Dashboard\General;

use App\Helpers\DashboardHelper;
use App\Http\Controllers\Controller;
use App\Traits\AdminRules;
use App\Traits\QueriesTrait;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ActionsController extends Controller
{
    use QueriesTrait, AdminRules;

    public function changePassword (Request $request): RedirectResponse
    {
        try {
            $passwords = $request->only('password', 'password_confirmation');
            $validator = Validator::make($passwords, $this->changePasswordRules());

            if ($validator->fails())
                return back()->with('error', $validator->messages()->first());

            $guard = DashboardHelper::getCurrentGuard();

            auth($guard)->user()->update([
                'password' => Hash::make($passwords['password']),
            ]);

            return redirect()->route('profile')->with('success', __('success.passwordChanged'));
        } catch (Exception) {
            return back()->with('error', __('error.somethingWentWrong'));
        }
    }

    public function updateProfile (Request $request, $guard, $id): RedirectResponse
    {
        try {
            $selected = $this->$guard()->find($id);

            if (auth($guard)->id() != $id) return back()->with('error', __('error.notAuthorized'));

            $validator = Validator::make($request->all(), $this->updateAdminRules($id));

            if ($validator->fails()) return back()->with('error', $validator->errors()->first());

            $data = $request->only(['name', 'username', 'email', 'phone' ,'image']);

            $data['username'] = strtolower($data['username']);

            if ($request['image']) {
                if ($selected['image'] != null) {
                    Storage::delete('public/' . $selected['image']);
                }
                $imageName = $data['username'] . '-' . time() . '.' . $data['image']->extension();
                $data['image']->storeAs('public/images/admins', $imageName);
                $data['image'] = 'images/admins/' . $imageName;
            }

            $selected->update($data);
            return redirect()->route('profile')->with('success', __('success.passwordChanged'));
        } catch (Exception) {
            return back()->with('error', __('error.somethingWentWrong'));
        }
    }

    public function updateAvatar(Request $request, $guard, $id): RedirectResponse
    {
        try {
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $imageName = time() . '.' . $avatar->getClientOriginalExtension();
                if ($guard != 'notAuthorized') {
                    $selectedUser = $this->$guard()->find($id);
                    if ($selectedUser->avatar != null) Storage::delete('public/images/' . $guard . 's/' . $selectedUser->avatar);
                    $avatar->storeAs('public/images/' . $guard . 's', $imageName);
                    $selectedUser->update(['avatar' => $imageName]);
                    return back()->with('success', __('success.avatarUpdated'));
                }
            }
            return back()->with('error', __('error.somethingWentWrong'));
        } catch (Exception) {
            return back()->with('error', __('error.somethingWentWrong'));
        }
    }

    public function removeAvatar($guard, $id): RedirectResponse
    {
        try {
            $selectedUser = $this->$guard()->find($id);
            $avatar_loc = 'public/images/' . $guard . 's/' . $selectedUser->avatar;
            if (Storage::exists($avatar_loc)) Storage::delete($avatar_loc);
            if ($guard == 'vendor') {
                $selectedUser->update(['avatar' => 'default.jpg']);
            } else {
                $selectedUser->update(['avatar' => null]);
            }
            return back()->with('success', __('success.avatarRemoved'));
        } catch (Exception) {
            return back()->with('error', __('error.somethingWentWrong'));
        }
    }

    public function togglePrimary ($id): RedirectResponse
    {
        try {
            if (auth('admin')->user()->is_primary) {

                $primariesCount = $this->admin()->where('is_primary', 1)->count();

                $selected = $this->admin()->find($id);

                if (($primariesCount <= 1 && $selected['is_primary']) || $selected['id'] == auth('admin')->id()) return back()->with('error', __('error.cannotUnsetPrimary'));

                if (! $selected['active']) return back()->with('error', __('error.cannotSetPrimary'));

                if ($selected) {
                    $selected['is_primary'] = $selected['is_primary'] ? 0 : 1;
                    $selected->save();
                    return back()->with('success', $selected['is_primary'] ? __('success.setPrimary') : __('success.unSetPrimary'));
                }
                return back()->with('error', __('error.somethingWentWrong'));
            }
            return back()->with('error', __('error.notAuthorized'));
        } catch (Exception) {
            return back()->with('error', __('error.somethingWentWrong'));
        }
    }

    public function toggleActive ($table, $id): RedirectResponse
    {
        try {
            $selected = $this->$table();

            if (!$selected) {
                return back()->with('error', __('error.somethingWentWrong'));
            }

            $selected = $selected->find($id);
            if ($selected) {
                if ($table == 'admin') {
                    if ($selected['is_primary']) return back()->with('error', __('error.cannotDeactivatePrimary'));
                }
                $selected['active'] = $selected['active'] ? 0 : 1;
                $selected->save();
                return back()->with('success', $selected['active'] ? __('success.activated') : __('success.deactivated'));
            }
            return back()->with('error', __('error.somethingWentWrong'));
        } catch (Exception) {
            return back()->with('error', __('error.somethingWentWrong'));
        }
    }
}
