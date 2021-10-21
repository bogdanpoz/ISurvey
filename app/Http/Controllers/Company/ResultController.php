<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Survey;

class ResultController extends Controller
{
    public function index(Survey $survey)
    {
        $questions = $survey->questions()
            ->with('responses')
            ->get();

        $attendees = $survey->attendees;

        $attendees_count = $attendees->count();
        $total_completed = $attendees->where('is_finished', 1)->count();

        $responses = [];

        foreach ($questions as $question) {
            $result = [
                'type' => $question->type,
                'text' => $question->text,
                'total_responses' => $question->responses->count(),
                'responses' => [],
            ];

            foreach ($question->responses as $response) {
                $result['responses'][] = $response->response;
            }

            if (in_array($question->type, ['multiple-choices', 'yes-no', 'dropdown', 'rating', 'slider'])) {
                $result['responses_aggregate'] = $question->responses->groupBy('response')->toArray();
            }

            $responses[] = $result;
        }

        $completion_rate =  ( $attendees_count > 0 ) ? ($total_completed / $attendees_count * 100) : 0;

        $show_results = false;
        $completion_ratio = 0;
        $need = 0;
        $done = 0;
        if($survey->max_results!=NULL){
            if($survey->max_results > $total_completed) { 
                $show_results = false; 
                $completion_ratio =  $total_completed/$survey->max_results*100;
                $need = $survey->max_results;
                $done = $total_completed;
            }
            else { true; }
        }
        else{ $show_results = true; }
        return view('company.survey.result', [
            'survey' => $survey,
            'need' => $need,
            'done' => $done,
            'show_results' => $show_results,
            'completion_ratio' => $completion_ratio,
            'results' => $responses,
            'total_completed' => $total_completed,
            'completion_rate' => round($completion_rate, 2),
            'attendees_count' => $attendees_count
        ]);
    }
}
