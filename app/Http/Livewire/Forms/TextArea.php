<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class TextArea extends Component
{

    public $itemId;
    public $itemName;
    public $itemValue;

    public function mount($itemId, $itemName, $itemValue){

        $this->itemId = $itemId;
        $this->itemName = $itemName;
        $this->itemValue = $itemValue;

    }

    public function render()
    {
        return view('livewire.forms.text-area');
    }
}
