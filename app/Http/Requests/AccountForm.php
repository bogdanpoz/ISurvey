<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AccountForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::user();

        if ('PUT' == Request::method()) {
            return [
                'name' => ['required', 'max:255'],
                'email' => ['required', 'regex:/(.+)@(.+)\.(.+)/i', 'email', 'max:255'],
                'password' => ['nullable', 'alpha_num', 'min:8'],
            ];
        }
    }
}
