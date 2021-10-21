<?php

namespace App\Http\Livewire\Company;

use App\Models\Question;
use App\Models\Survey;
use App\Traits\QuestionBuilder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowQuestionBuilder extends Component
{
    use QuestionBuilder;
    use AuthorizesRequests;
    use WithFileUploads;

    public $questions;

    public $activeQuestion;

    public $choices = [];

    public $survey;

    public $questionTypes;

    public $image;

    protected $rules = [
        'activeQuestion.text' => 'required',
        'activeQuestion.image' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        'activeQuestion.position' => 'required|integer',
        'activeQuestion.visibility' => 'required|in:0,1',
        'activeQuestion.is_required' => 'required|in:0,1',
        'activeQuestion.attributes.choice_selection_count' => 'required|integer',
        'activeQuestion.attributes.randomize_choice' => 'required|in:0,1',
        'activeQuestion.attributes.max_chars' => 'required|integer',
        'activeQuestion.attributes.date_format' => 'required',
        'activeQuestion.attributes.alphabetical_order' => 'required|in:0,1',
        'choices.*' => '',
    ];

    public function mount()
    {
        $this->questionTypes = $this->getQuestionTypes();

        $this->questions = $this->survey->questions()->orderBy('position')->get();

        if (! $this->questions->isEmpty()) {
            $this->showQuestion($this->questions->first());
        }
    }

    public function render()
    {
        $this->questions = $this->survey->questions()->orderBy('position')->get();

        return view('livewire.company.show-question-builder');
    }

    public function addChoice(Question $question)
    {
        array_push($this->choices, '');
    }

    public function submit()
    {
        $this->reassignChoices();

        if($this->image) {
            
            $this->validate([
               'image' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            ],['image.image' => 'The file must be of image type'
            ]);

            $filename = $this->image->store('questions','public');
            $this->activeQuestion->image = $filename;
        }
        
        $this->activeQuestion->save();

        $this->reset('image');

        $this->showQuestion($this->activeQuestion);
    }

    public function deleteQuestion(Question $question)
    {
        $question->delete();

        $this->activeQuestion = null;

        $this->mount();
    }

    public function deleteChoice($choiceKey)
    {
        unset($this->choices[$choiceKey]);
    }

    public function showQuestion(Question $question)
    {
        $this->activeQuestion = $question;

        $this->choices = ($this->activeQuestion->attributes['choices']) ?? [];
    }

    public function addQuestion($surveyUuid, $questionType)
    {
        try {
            $survey = Survey::where('uuid', $surveyUuid)->first();

            $this->authorize('addQuestion', $survey);

            $question = $survey->addEmptyQuestion($questionType);

            $this->showQuestion($question);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', 
                ['type' => 'warning',  'message' => $e->getMessage()]);
        }
    }

    private function reassignChoices()
    {
        $attributes = $this->activeQuestion->attributes;

        $attributes['choices'] = $this->choices;

        $this->activeQuestion->attributes = $attributes;
    }

    public function uploadImage()
    {
       $this->image->storePublicly('photos');
    }
}
