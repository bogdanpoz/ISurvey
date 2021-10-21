<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Survey;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Survey::template()->get();

        return view('company.templates.index', compact('templates'));
    }
}
