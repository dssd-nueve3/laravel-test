<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Header extends Component
{
    public $action;
    public $model;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action,$model)
    {
        $this->model = $model;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.header');
    }
}
