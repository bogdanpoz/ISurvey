<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Survey;

class QuestionController extends Controller
{
    public function index(Survey $survey)
    {
        return view('company.survey.question.index', compact('survey'));
    }
}
