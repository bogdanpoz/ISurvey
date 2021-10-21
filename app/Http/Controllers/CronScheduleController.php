<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class CronScheduleController extends Controller
{
    public function __invoke()
    {
        Artisan::call('schedule:run');

        return response()->json([
            'status' => 'OK'
        ]);
    }
}