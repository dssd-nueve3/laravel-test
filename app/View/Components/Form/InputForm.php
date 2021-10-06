<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputForm extends Component
{

    public $itemName;
    public $itemValue;
    public $itemType;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($itemName, $itemValue, $itemType)
    {
        $this->itemName = $itemName;
        $this->itemValue = $itemValue;
        $this->itemType = $itemType;
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
