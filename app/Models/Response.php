<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
        'attendee_id',
        'survey_id',
        'question_id',
        'response',
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
