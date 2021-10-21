<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Survey;
use App\SurveyUrl;
use Auth;

class ShareController extends Controller
{
    public function show(Survey $survey)
    {
       
        $surveys = Survey::owned()->get();
        return view('company.survey.share', compact('survey'), [
            'surveys' => $surveys
        ]);
    } 


    public function store(Survey $survey, Request $request) {

        

        $this->validate($request, [
            'survey_url' => 'required',
        ]);

       foreach($request->input('survey_url') as $key => $value) {
            $survey_Url = $request->input('survey_url')[$key];
            
            SurveyUrl::create([
            'user_id' => auth()->user()->id,
            'survey_id' => $survey->id, 
            'survey_url' => $survey_Url,

        ]);
        
    }
       
        return view('company.survey.share', compact('survey'));
        
    }
}
