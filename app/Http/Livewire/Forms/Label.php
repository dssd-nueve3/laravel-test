<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class Label extends Component
{

    public $value;

    public function mount($value){
        $this->value = $value;
    }


    public function render()
    {
        return view('livewire.forms.label');
    }
}
