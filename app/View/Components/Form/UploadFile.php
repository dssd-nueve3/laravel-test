<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class UploadFile extends Component
{
    public $itemName;
    public $itemId;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($itemName)
    {
       $this->itemName = $itemName;
       $this->itemId = $itemName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.upload-file');
    }
}
