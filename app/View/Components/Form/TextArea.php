<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class TextArea extends Component
{

    public $textArea;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($textArea)
    {
        $this->textArea = $textArea;
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
