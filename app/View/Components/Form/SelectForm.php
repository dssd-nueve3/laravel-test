<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class SelectForm extends Component
{

    public $itemSaved;
    public $collectionItem;
    public $itemName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct($itemName, $itemSaved, $collectionItem)
    {
        $this->itemName = $itemName;
        $this->itemSaved = $itemSaved;
        $this->collectionItem = $collectionItem;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select-form');
    }
}
