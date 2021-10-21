<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyForm;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::orderBy('created_at', 'desc')->get();

        return view('admin.survey.index', compact('surveys'));
    }

    public function edit(Survey $survey)
    {
        return view('admin.survey.edit', compact('survey'));
    }

    public function update(SurveyForm $request, Survey $survey)
    {
        $survey->update($request->validated());

        flash(__('Survey updated successfully.'), 'success');

        return redirect()->route('admin.surveys.index');
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();

        flash(__('Survey deleted successfully.'), 'success');

        return redirect()->route('admin.surveys.index');
    }
}
