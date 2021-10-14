<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;


class UploadFile extends Component
{

    public $model;
    public $itemName;

    public function mount($model, $itemName){

        $this->model ='App\Models\\' . $model;
        $this->itemName = $itemName;


    }

    public function render()
    {
        return view('livewire.forms.upload-file');
    }
}
