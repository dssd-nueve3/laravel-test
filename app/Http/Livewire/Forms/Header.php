<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class Header extends Component
{

    public $action;
    public $model;
    public $type;

    public function mount($action, $model, $type){

        $this->action = $action;
        $this->model = $model;
        $this->type = $type;

    }

    public function render()
    {
        return view('livewire.forms.header');
    }
}
