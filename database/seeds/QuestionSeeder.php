<?php

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'survey_id' => 1,
            'text' => 'Question 1',
            'type' => 'multiple-choices',
            'position' => 1,
            'attributes' => [
                'choice_selection_count' => 3,
                'randomize_choice' => true,
                'choices' => [
                    0 => 'Choice 1',
                    1 => 'Choice 2',
                    2 => 'Choice 3',
                ]
            ]
        ]);

        Question::create([
            'survey_id' => 1,
            'text' => 'Question 2',
            'type' => 'phone',
            'position' => 2,
        ]);

        Question::create([
            'survey_id' => 1,
            'text' => 'Question 3',
            'type' => 'short-text',
            'position' => 3,
            'attributes' => [
                'max_chars' => 10,
            ]
        ]);

        Question::create([
            'survey_id' => 1,
            'text' => 'Question 4',
            'type' => 'long-text',
            'position' => 4,
            'attributes' => [
                'max_chars' => 100,
            ]
        ]);

        Question::create([
            'survey_id' => 1,
            'text' => 'Question 5',
            'type' => 'yes-no',
            'position' => 5,
            'attributes' => [
                'choices' => [
                    1 => 'Yes',
                    2 => 'No',
                ]
            ]
        ]);

        Question::create([
            'survey_id' => 1,
            'text' => 'Question 6',
            'type' => 'email',
            'position' => 6,
        ]);

        Question::create([
            'survey_id' => 1,
            'text' => 'Question 7',
            'type' => 'rating',
            'position' => 7,
            'attributes' => [
                'choices' => [
                    1, 2, 3, 4, 5
                ]
            ]
        ]);

        Question::create([
            'survey_id' => 1,
            'text' => 'Question 8',
            'type' => 'date',
            'position' => 8,
            'attributes' => [
                'date_format' => 'y-m-d',
            ]
        ]);

        Question::create([
            'survey_id' => 1,
            'text' => 'Question 9',
            'type' => 'number',
            'position' => 9,
        ]);

        Question::create([
            'survey_id' => 1,
            'text' => 'Question 10',
            'type' => 'dropdown',
            'position' => 10,
            'attributes' => [
                'alphabetical_order' => true,
                'randomize' => true,
                'choices' => [
                    0 => 'Red',
                    1 => 'Orange',
                    2 => 'Blue',
                    3 => 'Yellow',
                ]
            ]
        ]);

        Question::create([
            'survey_id' => 1,
            'text' => 'Question 11',
            'type' => 'legal',
            'position' => 11,
        ]);
    }
}
