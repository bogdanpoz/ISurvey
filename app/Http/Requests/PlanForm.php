<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PlanForm extends FormRequest
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
                'title' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric'],
                'code' => ['required', 'string', 'unique:plans', 'max:255'],
                'interval' => ['required', 'in:monthly,yearly'],
                'description' => ['required', 'string', 'max:1000'],
                'stripe_plan_id' => ['nullable', 'string'],
            ];
        }

        if ('PUT' == Request::method()) {
            return [
                'title' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric'],
                'code' => ['required', 'string', 'max:255'],
                'interval' => ['required', 'in:monthly,yearly'],
                'description' => ['required', 'string', 'max:1000'],
                'stripe_plan_id' => ['nullable', 'string'],
            ];
        }
    }
}
