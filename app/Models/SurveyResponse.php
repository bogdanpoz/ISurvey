<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $fillable = [
        'question_id',
        'uuid',
        'is_finished',
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
