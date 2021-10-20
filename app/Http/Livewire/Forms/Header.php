<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class Header extends Component
{

    /**
     * $element_type should be only H1 to H6 html element
     * $model is the model we use in the view
     * $action is the element of the CRUD we are using in the view
     */

    public $action;
    public $model;
    public $element_type;



    public function mount($action, $model, $element_type){

        $this->action = $action;
        $this->model = $model;
        $this->element_type = $element_type;
    }

    public function render()
    {
        return view('livewire.forms.header');
    }
}
