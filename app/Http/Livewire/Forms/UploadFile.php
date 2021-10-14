<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Livewire\WithFileUploads;


class UploadFile extends Component
{

    use WithFileUploads;

    public $model;
    public $itemName;
    public $itemSaved;

    public function mount($model, $itemName, $itemSaved){

        $this->itemName = $itemName;
        $this->itemSaved = $itemSaved;

        $this->model ='App\Models\\' . $model . "::create([])";


    }

    public function render()
    {
        return view('livewire.forms.upload-file');
    }

}
