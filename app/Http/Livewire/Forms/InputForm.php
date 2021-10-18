<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class InputForm extends Component
{
    public $itemName;
    public $itemValue;
    public $itemType;
    public $bladeAttributes;
    public $attributes;

    public function mount($itemName, $itemValue, $itemType, $bladeAttributes){
        $this->itemName = $itemName;
        $this->itemValue = $itemValue;
        $this->itemType = $itemType;
        $this->mapAttributes($bladeAttributes);
    }

    public function mapAttributes($bladeAttributes){

        $attributes = "";
        collect($bladeAttributes)->each(function($value, $attr) use (&$attributes){
            $attributes .= " {$attr}=\"{$value}\"";
        });

        $this->attributes = $attributes;

    }

    public function render()
    {
        return view('livewire.forms.input-form');
    }
}
