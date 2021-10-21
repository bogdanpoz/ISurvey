<?php

namespace App\Http\Controllers;

use App\Models\Plan;

class HomeController extends Controller
{
    public function index()
    {
        try {
            \DB::connection()->getPdo();
            $hasConnection = true;
        } catch (\Exception $e) {
            $hasConnection =  false;
        }

        if($hasConnection) {
            $plans = Plan::all();
        } else {
            $plans = [];
        }

        return view('front.home', compact('plans'));
    }
}
