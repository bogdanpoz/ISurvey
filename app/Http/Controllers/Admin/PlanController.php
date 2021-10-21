<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanForm;
use App\Models\Plan;
use App\Models\PlanOption;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();

        return view('admin.plan.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plan.create');
    }

    public function store(PlanForm $request)
    {
        $plan = Plan::create($request->validated());

        $this->addPlanFeatures($plan, $this->getPlanInputs($request));

        flash(__('Plan added successfully.'), 'success');

        return redirect()->route('admin.plans.index');
    }

    public function edit(Plan $plan)
    {
        return view('admin.plan.edit', [
            'plan' => $plan,
            'options' => $plan->planOptions,
        ]);
    }

    public function update(PlanForm $request, Plan $plan)
    {
        $plan->update($request->validated());

        $plan->planOptions()->delete();

        $this->addPlanFeatures($plan, $this->getPlanInputs($request));

        flash(__('Plan updated successfully.'), 'success');

        return redirect()->route('admin.plans.index');
    }

    public function destroy(Plan $plan)
    {
        $plan->planOptions()->delete();

        $plan->delete();

        flash(__('Plan deleted successfully.'), 'success');

        return redirect()->route('admin.plans.index');
    }

    private function addPlanFeatures(Plan $plan, $options)
    {
        foreach ($options as $option) {
            $optionArray[] = new PlanOption($option);
        }

        return $plan->planOptions()->saveMany($optionArray);
    }

    private function getPlanInputs(Request $request)
    {
        return [
            [
                'feature_code' => 'survey_count',
                'limit' => $request->input('survey_count'),
            ],

            [
                'feature_code' => 'question_count_per_survey',
                'limit' => $request->input('question_count_per_survey'),
            ],

            [
                'feature_code' => 'response_count_per_survey',
                'limit' => $request->input('response_count_per_survey'),
            ],
        ];
    }
}
