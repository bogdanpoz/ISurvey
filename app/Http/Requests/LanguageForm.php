<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LanguageForm extends FormRequest
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

        if ('POST' == Request::method()) {
            return [
                'name' => ['required', 'string', 'max:255', 'unique:languages'],
                'code' => ['required', 'string', 'max:255'],
                'status' => ['required', 'in:0,1'],
            ];
        }

        if ('PUT' == Request::method()) {
            return [
                'name' => ['required', 'string', 'max:255'],
                'code' => ['required', 'string', 'max:255'],
                'status' => ['required', 'in:0,1'],
            ];
        }
    }
}
