<?php

namespace App\Exports;

use App\Models\Response;
use App\Models\Survey;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SurveyResponseExport implements FromCollection, WithHeadings
{
    protected $survey;

    public function __construct(Survey $survey)
    {
        $this->survey = $survey;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $attendees = $this->survey->attendees;
        $questions = $this->survey->questions;
        $data = [];

        foreach ($attendees as $attendee) {

            $responses = Response::where('survey_id', $this->survey->id)
                ->where('attendee_id', $attendee->id)
                ->get();

            if ($responses->isEmpty()) {
                continue;
            }

            foreach ($questions as $question) {
                $response = $responses->where('question_id', $question->id)->first();
                $result[$question->id] = $response->response ?? '';
            }

            $data[] = $result;
        }

        return collect($data);

    }

    public function headings(): array
    {
        return $this->survey->questions->pluck('text')->toArray();
    }
}
