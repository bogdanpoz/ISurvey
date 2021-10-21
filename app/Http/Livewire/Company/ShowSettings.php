<?php

namespace App\Http\Livewire\Company;;

use Livewire\Component;
use App\Models\Survey;

class ShowSettings extends Component
{
    public $survey;

    public $activeSetting = 'background';

    
    public function renderBackgroundSettings() {
        $this->activeSetting = 'background';
    }

    public function renderDesignSettings() {
        $this->activeSetting = 'design';
    }


    public function render()
    {
        return view('livewire.company.show-settings');
    }
}
