<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'survey_id',
        'text',
        'type',
        'position',
        'visibility',
        'attributes',
        'is_required',
        'image'
    ];

    protected $casts = [
        'attributes' => 'array',
    ];

    public const MULTIPLE_CHOICES = 'multiple-choices';
    public const YES_NO = 'yes-no';
    public const DROPDOWN = 'dropdown';
    public const SHORT_TEXT = 'short-text';
    public const LONG_TEXT = 'long-text';
    public const NUMBER = 'number';
    public const EMAIL = 'email';
    public const PHONE = 'phone';
    public const DATE = 'date';
    public const RATING = 'rating';
    public const SLIDER = 'slider';

    protected static function booted()
    {
        static::created(function ($question) {
            $question->survey()->increment('questions_count');
        });

        static::deleted(function ($question) {
            $question->survey()->decrement('questions_count');
        });
    }

    public function survey()
    {
        return $this->belongsTo('App\Models\Survey');
    }

    public function responses()
    {
        return $this->hasMany('App\Models\Response');
    }

    public function scopeActive($query)
    {
        return $query->where('visibility', '=', 1);
    }

    public function getAttributesValue()
    {
        return $this->attributes;
    }

    public function choices()
    {
        if (self::MULTIPLE_CHOICES !== $this->type &&
                self::YES_NO !== $this->type &&
                self::DROPDOWN !== $this->type &&
                self::SLIDER !== $this->type) {
            return;
        }

        $attributes = json_decode($this->attributes['attributes']);

        if (isset($attributes->randomize_choice) && $attributes->randomize_choice) {
            shuffle($attributes->choices);
        }

        return $attributes->choices;
    }
}
