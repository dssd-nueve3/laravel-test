<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class TextArea extends Component
{

    public $itemName;
    public $itemValue;
    public $itemId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($itemName, $itemValue, $itemId)
    {

        $this->itemName = $itemName;
        $this->itemValue = $itemValue;
        $this->itemId = $itemId;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text-area');
    }
}
