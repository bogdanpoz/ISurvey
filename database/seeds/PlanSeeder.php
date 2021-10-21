<?php

use Illuminate\Database\Seeder;
use App\Models\Plan;
use App\Models\PlanOption;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'title' => 'Plan 1',
            'description' => 'Some description here',
            'code' => 'plan-1',
            'price' => 0,
            'interval' => 'monthly',
        ]);

        Plan::create([
            'title' => 'Plan 2',
            'description' => 'Some description here',
            'code' => 'plan-2',
            'price' => 10,
            'interval' => 'monthly',
            'stripe_plan_id' => 'price_1HxSQALa1GNFZqgOklQVUj7y'
        ]);

        Plan::create([
            'title' => 'Plan 3',
            'description' => 'Some description here',
            'code' => 'plan-3',
            'price' => 50,
            'interval' => 'monthly',
            'stripe_plan_id' => 'price_1ItdoYLa1GNFZqgOMwZyjkxh'
        ]);

        PlanOption::create([
            'plan_id' => 1,
            'feature_code' => 'survey_count',
            'limit' => 10,
        ]);

        PlanOption::create([
            'plan_id' => 1,
            'feature_code' => 'question_count_per_survey',
            'limit' => 10,
        ]);

        PlanOption::create([
            'plan_id' => 1,
            'feature_code' => 'response_count_per_survey',
            'limit' => 10,
        ]);

        PlanOption::create([
            'plan_id' => 2,
            'feature_code' => 'survey_count',
            'limit' => 10,
        ]);

        PlanOption::create([
            'plan_id' => 2,
            'feature_code' => 'question_count_per_survey',
            'limit' => 10,
        ]);

        PlanOption::create([
            'plan_id' => 2,
            'feature_code' => 'response_count_per_survey',
            'limit' => 10,
        ]);

        PlanOption::create([
            'plan_id' => 3,
            'feature_code' => 'survey_count',
            'limit' => 10,
        ]);

        PlanOption::create([
            'plan_id' => 3,
            'feature_code' => 'question_count_per_survey',
            'limit' => 10,
        ]);

        PlanOption::create([
            'plan_id' => 3,
            'feature_code' => 'response_count_per_survey',
            'limit' => 10,
        ]);
    }
}
