<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function edit(Survey $survey)
    {
        return view('company.survey.design', compact('survey'));
    }

    public function update(Survey $survey, Request $request)
    {
        $validatedData = $request->validate([
            'font_style' => ['required'],
            'question_color' => ['required'],
            'answer_color' => ['required'],
            'button_color' => ['required'],
            'button_text_color' => ['required'],
            'background_color' => ['required'],
        ]);

        $survey->forceFill($validatedData)->save();

        return redirect()->back();
    }
}
