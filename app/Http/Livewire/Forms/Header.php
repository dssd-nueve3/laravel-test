<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class Header extends Component
{

    public $action;
    public $model;

    public function mount($action, $model){

        $this->action = $action;
        $this->model = $model;

    }

    public function render()
    {
        return view('livewire.forms.header');
    }
}
