<?php

namespace App\Models;

use App\Traits\QuestionBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Webpatser\Uuid\Uuid;
use App\SurveyUrl;

class Survey extends Model
{
    use QuestionBuilder;

    protected $fillable = [
        'user_id',
        'uuid',
        'title',
        'goodbye_text',
        'require_password',
        'password',
        'redirect_url',
        'logo',
        'color',
        'visibility',
        'annomous',
        'welcome_message',
        'responses_count',
        'questions_count',
        'is_template',
        'font_style',
        'question_color',
        'answer_color',
        'button_color',
        'button_text_color',
        'background_color',
        'notify_new_responses'
    ];

    protected $attributes = [
        'font_style' => 'Arial',
        'question_color' => '#303532',
        'answer_color' => 'rgb(0, 0, 0)',
        'button_color' => 'rgb(23, 162, 184)',
        'button_text_color' => 'rgb(255, 255, 255)',
        'background_color' => '#FBFBFB',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function urls()
    {
        return $this->hasMany(SurveyUrl::class);
    }

    public function url()
    {
        return route('front.survey.show', [$this]);
    }

    public function embedUrl()
    {
        return route('front.survey.show', ['survey' => $this, 'embed' => true]);
    }

    public function addEmptyQuestion($questionType)
    {
        $attributes = $this->getQuestionAttribute($questionType);

        return $this->questions()->create([
            'text' => __('Untitled'),
            'type' => $questionType,
            'position' => $this->questions()->count() + 1,
            'attributes' => $attributes,
            'visibility' => true,
            'visibility' => false,
            'is_required' => true,
        ]);
    }

    public function scopeTemplate($query)
    {
        return $query->where('is_template', '=', 1);
    }

    public function isTemplate()
    {
        return 1 == $this->is_template;
    }

    public function shouldNotify()
    {
        return $this->notify_new_responses;
    }

    public function attendees()
    {
        return $this->hasMany('App\Models\Attendee');
    }

    public function responses()
    {
        return $this->hasMany('App\Models\Response');
    }

    public function isPublished()
    {
        return true == $this->visibility;
    }

    public function createAttendee()
    {
        return $this->attendees()->create([
            'fingerprint' => Str::random(20),
        ]);
    }

    public function scopeOwned($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }
}
