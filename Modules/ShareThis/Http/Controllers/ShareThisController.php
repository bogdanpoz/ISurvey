<?php

namespace Modules\ShareThis\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShareThisController extends Controller
{
    public function index()
    {
        return view('sharethis::index', [
            'sharethis_status' => settings()->get('sharethis_status'),
            'sharethis_property' => settings()->get('sharethis_property'),
        ]);
    }

    public function store(Request $request)
    {
        settings()->set('sharethis_status', $request->input('sharethis_status'));
        settings()->set('sharethis_property', $request->input('sharethis_property'));

        flash('Changes saved successfully.', 'success');

        return redirect()->back();
    }
}
