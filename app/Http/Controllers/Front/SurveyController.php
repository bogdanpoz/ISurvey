<?php

namespace App\Http\Controllers\Front;

use App\Events\SurveyResponseSubmitted;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttendSurvey;
use App\Http\Requests\SurveyPassword;
use App\Models\Attendee;
use App\Models\Response;
use App\Models\Survey;
use App\Notifications\SurveyHasNewResponse;
use Illuminate\Support\Facades\Session;

class SurveyController extends Controller
{
    public function show(Survey $survey)
    {
        if (! $survey->isPublished()) {
            abort(404);
        }

        return view('front.survey.show', compact('survey'));
    }

    public function start(Survey $survey)
    {
        $param = [
            'survey' => $survey
        ];

        if (request()->has('embed')) {
            $param['embed'] = true;
        }

        if (! $survey->isPublished()) {
            abort(404);
        }

        if ($survey->require_password) {
            if (Session::get('survey') !== 'survey-'.$survey->id) {
                return redirect()->route('front.survey.password', $param);
            }
        }

        $attendee = Session::get('attendee');
        if (! $attendee) {
            $attendee = $survey->createAttendee();
            Session::put('attendee', $attendee->uuid);
        }

        $survey = $survey->load(['questions' => function ($query) {
            $query->active()
                ->orderBy('position');
        }]);

        $totalQuestions = $survey->questions()->count();

        return view('front.survey.start', compact('survey', 'totalQuestions'));
    }

    public function submit(AttendSurvey $request, Survey $survey)
    {
        if (! Session::has('attendee')) {
            return redirect()->route('front.survey.show', ['survey' => $survey]);
        }

        $attendeeId = Session::get('attendee');
        $attendee = Attendee::where('uuid', $attendeeId)->first();

        $data = [];

        foreach ($request->response as $question => $answer) {
            $data[] = [
                'attendee_id' => $attendee->id,
                'survey_id' => $survey->id,
                'question_id' => $question,
                'response' => $answer,
                'created_at' => now(),
            ];
        }

        Response::insert($data);

        $attendee->is_finished = 1;
        $attendee->save();

        $survey->increment('responses_count');

        event(new SurveyResponseSubmitted($survey));

        $param = [
            'survey' => $survey
        ];

        if ($request->input('embed')) {
            $param['embed'] = true;
        }

        return redirect()->route('front.survey.finish', $param);
    }

    public function finish(Survey $survey)
    {
        $param = [
            'survey' => $survey
        ];

        if (request()->has('embed')) {
            $param['embed'] = true;
        }

        if (! Session::has('attendee')) {
            return redirect()->route('front.survey.show', $param);
        }

        $attendeeId = Session::get('attendee');
        $attendee = Attendee::where('uuid', $attendeeId)->first();

        if (! $attendee->is_finished) {
            return redirect()->route('front.survey.start', $param);
        }

        Session::forget('attendee');

        return view('front.survey.finish', compact('survey'));
    }

    public function password(Survey $survey)
    {
        $param = [
            'survey' => $survey
        ];

        if (request()->has('embed')) {
            $param['embed'] = true;
        }

        if (! $survey->require_password || Session::has('survey-'.$survey->id)) {
            return redirect()->route('front.survey.start', ['survey' => $survey]);
        }

        return view('front.survey.password', compact('survey'));
    }

    public function submitPassword(SurveyPassword $request, Survey $survey)
    {
        $param = [
            'survey' => $survey
        ];

        if (request()->has('embed')) {
            $param['embed'] = true;
        }

        if ($request->password === $survey->password) {
            Session::put('survey', 'survey-'.$survey->id);

            return redirect()->route('front.survey.start', $param);
        }

        return back()->withErrors([
            'password' => __('The password is incorrect')
        ]);
    }
}
