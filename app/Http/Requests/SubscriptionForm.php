<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SubscriptionForm extends FormRequest
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
                'plan_id' => ['required', 'string'],
                'starts_at' => ['nullable', 'date', 'after:yesterday'],
                'ends_at' => ['nullable', 'date', 'after:starts_at'],
            ];
        }

        if ('POST' == Request::method()) {
            return [
                'plan_id' => ['required', 'string', 'exists:plans,id'],
                'starts_at' => ['required', 'date', 'after:yesterday'],
                'ends_at' => ['required', 'date', 'after:starts_at'],
                'user_id' => ['required', 'exists:users,id']
            ];
        }
    }
}
