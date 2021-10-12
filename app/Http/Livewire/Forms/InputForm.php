<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class InputForm extends Component
{

    public $itemName;
    public $itemValue;
    public $itemType;

    public function mount($itemName, $itemValue, $itemType){

        $this->itemName = $itemName;
        $this->itemValue = $itemValue;
        $this->itemType = $itemType;

    }

    public function render()
    {
        return view('livewire.forms.input-form');
    }
}
