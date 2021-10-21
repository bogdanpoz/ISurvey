<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserForm;
use App\Models\Language;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::role('company')->orderBy('created_at', 'desc')->get();

        return view('admin.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        $languages = Language::all();

        return view('admin.user.edit', compact('user', 'languages'));
    }

    public function update(UserForm $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->language_id = $request->input('language_id');
        if (! empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->update();

        flash(__('User updated successfully.'), 'success');

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        flash(__('User deleted successfully.'), 'success');

        return redirect()->route('admin.users.index');
    }
}
