<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanOption extends Model
{
    public static $features = [
        'survey_count',
        'question_count_per_survey',
        'response_count_per_survey',
    ];

    protected $fillable = [
        'plan_id',
        'feature_code',
        'limit',
    ];

    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }
}
