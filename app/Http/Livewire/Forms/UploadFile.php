<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;


class UploadFile extends Component
{

    public $model;

    public function mount($model){

        $this->model ='App\Models\\' . $model;


    }

    public function render()
    {
        return view('livewire.forms.upload-file');
    }
}
