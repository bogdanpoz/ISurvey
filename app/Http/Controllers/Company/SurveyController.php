<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::owned()->get();
        return view('company.survey.index', compact('surveys'));
    }

    public function store()
    {
        $this->authorize('create', Survey::class);

        $survey = Survey::create([
            'user_id' => auth()->user()->id,
            'title' => __('Untitled'),
            'welcome_message' => __('Welcome to our survey.'),
            'goodbye_text' => __('Thanks for your time.'),
            'visibility' => 0,
            'annomous' => 0,
        ]);

        return redirect()->route('company.surveys.edit', $survey);
    }

    public function edit(Survey $survey)
    {
        $this->authorize('update', $survey);
        return view('company.survey.edit', compact('survey'));
    }

    public function update(Survey $survey, Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required'],
            'goodbye_text' => ['required'],
            'welcome_message' => ['required'],
            'redirect_url' => ['nullable', 'url'],
            'max_results' => ['nullable'],
            'password' => ['nullable'],
        ]);

        $validatedData['require_password'] = $request->has('require_password') ? 1 : 0;
        $validatedData['visibility'] = $request->has('visibility') ? 1 : 0;
        $validatedData['annomous'] = $request->has('annomous') ? 1 : 0;
        $validatedData['notify_new_responses'] = $request->has('notify_new_responses') ? 1 : 0;

        $survey->fill($validatedData)->save();

        return redirect()->back();
    }

    public function duplicate(Survey $survey)
    {
        $this->authorize('create', Survey::class);

        if (! $survey->isTemplate()) {
            return false;
        }

        $newSurvey = $survey->replicate();

        $newSurvey->forceFill([
            'user_id' => auth()->user()->id,
            'title' => $newSurvey->title.' (copy)',
            'created_at' => now(),
            'is_template' => 0,
            'responses_count' => 0,
            'questions_count' => 0,
        ])->save();

        $questions = $survey->questions;

        if (count($questions) > 0) {
            foreach ($questions as $question) {
                $newQuestion = $question->replicate();

                $newQuestion->forceFill([
                    'survey_id' => $newSurvey->id,
                    'created_at' => now(),
                ])->save();
            }
        }

        return redirect()->route('company.surveys.edit', $newSurvey);
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();

        flash(__('Survey deleted successfully.'))->success();

        return redirect()->route('company.surveys.index');
    }
}
