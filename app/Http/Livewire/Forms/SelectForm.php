<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class SelectForm extends Component
{

    public $itemName;
    public $itemSaved;
    public $collectionItem;

    public function mount($itemName, $itemSaved, $collectionItem){

        $this->itemName = $itemName;
        $this->itemSaved = $itemSaved;
        $this->collectionItem = $collectionItem;

    }

    public function render()
    {
        return view('livewire.forms.select-form');
    }
}
