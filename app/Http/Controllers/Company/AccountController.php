<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountForm;
use App\User;
use Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('company.account.edit', compact('user'));
    }

    public function update(AccountForm $request, User $user)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->main_color = $request->input('main_color');
        $user->primary_color = $request->input('primary_color');
        $user->secondary_color = $request->input('secondary_color');

        if (! empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->update();

        flash()->success(__('Account Details Updated Successfully.'), 'success');

        return redirect()->back();
    }
}
