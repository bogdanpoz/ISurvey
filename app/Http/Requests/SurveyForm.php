<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SurveyForm extends FormRequest
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
                'title' => ['required', 'max:255'],
                'goodbye_text' => ['required', 'string', 'max:1000'],
                'welcome_message' => ['required', 'string', 'max:1000'],
                'redirect_url' => ['nullable', 'url'],
                'require_password' => ['required', 'in:0,1'],
                'password' => ['nullable', 'alpha_num', 'min:8'],
                'visibility' => ['required', 'in:0,1'],
                'question_color' => ['required', 'max:255'],
                'answer_color' => ['required', 'max:255'],
                'button_color' => ['required', 'max:255'],
                'button_text_color' => ['required', 'max:255'],
                'background_color' => ['required', 'max:255'],
                'is_template' => ['required', 'in:0,1'],
            ];
        }
    }
}
