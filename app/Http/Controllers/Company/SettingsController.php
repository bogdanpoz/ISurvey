<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survey;

class SettingsController extends Controller
{
    public function index(Survey $survey)
    {
        $surveys = Survey::owned()->get();
        return view('company.survey.settings', compact('survey'));
    } 
}
