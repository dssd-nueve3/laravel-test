<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputForm extends Component
{

    public $itemName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($itemName)
    {
        $this->itemName = $itemName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-form');
    }
}
