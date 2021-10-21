<?php

namespace App\Http\Requests;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AttendSurvey extends FormRequest
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
        $data = [
            'response' => 'required|array',
        ];
        $questions = $this->survey->questions;
        foreach ($questions as $question) {
            if ($question->is_required) {
                $data['response.'.$question->id] = 'required';
            }
        }

        return $data;
    }

    public function messages()
    {
        $messages = [];
        $questions = $this->survey->questions;
        foreach ($questions as $question) {
            if ($question->is_required) {
                $messages['response.'.$question->id.'.required'] = 'This field is required';
            }
        }

        return $messages;
    }
}
