<?php

namespace App\Traits;

trait QuestionBuilder
{
    public $types = [
        [
            'key' => 'multiple-choices',
            'title' => 'Multiple Choices',
            'attributes' => [
                'choice_selection_count' => 1,
                'randomize_choice' => 0,
                'choices' => [
                    '',
                    '',
                ],
            ],
        ],

        [
            'key' => 'phone',
            'title' => 'Phone',
        ],

        [
            'key' => 'email',
            'title' => 'Email',
        ],

        [
            'key' => 'short-text',
            'title' => 'Short Text',
            'attributes' => [
                'max_chars' => 50,
            ],
        ],

        [
            'key' => 'long-text',
            'title' => 'Long Text',
            'attributes' => [
                'max_chars' => 200,
            ],
        ],

        [
            'key' => 'yes-no',
            'title' => 'Yes or No',
            'attributes' => [
                'choices' => [
                    1 => 'Yes',
                    2 => 'No',
                ],
            ],
        ],

        [
            'key' => 'rating',
            'title' => 'Rating',
            'attributes' => [
                'choices' => [
                    1,
                    2,
                    3,
                    4,
                    5,
                ],
            ],
        ],

        [
            'key' => 'date',
            'title' => 'Date',
            'attributes' => [
                'date_format' => 'MMDDYYYY',
            ],
        ],

        [
            'key' => 'number',
            'title' => 'Number',
        ],

        [
            'key' => 'dropdown',
            'title' => 'Dropdown',
            'attributes' => [
                'alphabetical_order' => false,
                'randomize' => false,
                'choices' => [],
            ],
        ],
        [
            'key' => 'slider',
            'title' => 'Slider',
            'attributes' => [
                'choice_selection_count' => 1,
                'randomize_choice' => 0,
                'choices' => [
                    0,
                    100,
                ],
            ],
        ]
    ];

    public function getQuestionTypes()
    {
        return collect($this->types)->pluck('title', 'key');
    }

    public function getQuestionAttribute($type)
    {
        $attributes = collect($this->types)->where('key', $type)->first();

        return (isset($attributes['attributes'])) ? $attributes['attributes'] : null;
    }
}
