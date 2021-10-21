<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Response;
use App\Models\Survey;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'users' => User::role('company')->count(),
            'surveys' => Survey::count(),
            'responses' => Survey::sum('responses_count'),
            'surveyData' => $this->getSurveyAnalytics(),
            'userData' => $this->getUserAnalytics(),
            'responseData' => $this->getResponseAnalytics(),
        ]);
    }

    private function getUserAnalytics()
    {
        $users = User::role('company')
        ->orderBy('created_at')
        ->get()
        ->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('M d');
        })->toArray();

        $periods = CarbonPeriod::create(Carbon::now()->subDays(13), '1 day', Carbon::now());

        return $this->transformDataForChart($periods, $users);
    }

    private function getSurveyAnalytics()
    {
        $surveys = Survey::where('created_at', '>=', now()->subDays(13))
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('M d');
            })->toArray();

        $periods = CarbonPeriod::create(Carbon::now()->subDays(13), '1 day', Carbon::now());

        return $this->transformDataForChart($periods, $surveys);
    }

    private function getResponseAnalytics()
    {
        $responses = Response::where('created_at', '>=', now()->subDays(13))
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('M d');
            })->toArray();

        $periods = CarbonPeriod::create(Carbon::now()->subDays(13), '1 day', Carbon::now());

        return $this->transformDataForChart($periods, $responses);
    }

    private function transformDataForChart($periods, $data)
    {
        foreach ($periods as $key => $date) {
            if (array_key_exists($date->format('M d'), $data)) {
                $results[] = [
                    'date' => $date->format('M d'),
                    'count' => collect($data[$date->format('M d')])->count(),
                ];
            } else {
                $results[] = [
                    'date' => $date->format('M d'),
                    'count' => 0,
                ];
            }
        }

        return $results;
    }
}
