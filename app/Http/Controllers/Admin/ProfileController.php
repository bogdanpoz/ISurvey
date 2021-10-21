<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileForm;
use App\Models\Language;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        $languages = Language::all();

        return view('admin.profile.edit', [
            'user' => $user, 'languages' => $languages,
        ]);
    }

    public function update(ProfileForm $request, User $user)
    {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->language_id = $request->input('language_id');

        if (! empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->update();

        flash(__('Profile updated successfully.'), 'success');

        return redirect()->route('admin.profile.edit');
    }
}
