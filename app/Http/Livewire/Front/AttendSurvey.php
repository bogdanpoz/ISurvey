<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class AttendSurvey extends Component
{
    public $survey;

    public $started;

    public $attendee;

    public $responses;

    public $questions;

    public $currentQuestion;

    public $counter;

    public $totalQuestions;

    protected $rules = [
        'responses.*' => 'required',
    ];

    public function mount()
    {
        $this->started = false;
        $this->attendee = null;
        $this->responses = [];
        $this->questions = [];
        $this->currentQuestion = null;
        $this->counter = 0;
        $this->totalQuestions = 0;
    }

    public function render()
    {
        return view('livewire.front.attend-survey');
    }

    public function start()
    {
        if (! $this->survey->isPublished()) {
            abort(404);
        }

        $this->started = true;

        $this->attendee = $this->survey->createAttendee();

        $this->questions = $this->survey->questions()->active()->orderBy('position')->get();

        $this->totalQuestions = $this->questions->count();

        $this->getNextQuestion();
    }

    public function next()
    {
        if (! $this->survey->isPublished()) {
            abort(404);
        }

        $this->getNextQuestion();
    }

    public function submit()
    {
        $this->started = false;
    }

    private function getNextQuestion()
    {
        $this->counter = $this->counter + 1;

        if ($this->counter <= $this->totalQuestions) {
            $this->currentQuestion = $this->questions->shift();
        } else {
            $this->submit();
        }
    }
}
