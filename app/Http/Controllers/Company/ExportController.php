<?php

namespace App\Http\Controllers\Company;

use App\Models\Survey;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SurveyResponseExport;

class ExportController extends Controller
{
    public function export(Survey $survey)
    {
        return Excel::download(new SurveyResponseExport($survey), $survey->title.'.csv');
    }
}
