<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyUrl extends Model
{
    protected $fillable = [
        'user_id',
        'survey_id',
        'survey_url',

    ];

    public function urls()
    {
        return $this->hasMany('App\Survey_Url', 'survey_id');
    }
}
