<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $name;
    public $method;
    public $action;
    public $submitAction;

    public function __construct(
            $name = null, 
            $method = null, 
            $action = null,
            $submitAction = null
    )
    {
        $this->name = $name;
        $this->method = $method;
        $this->action = $action;
        $this->submitAction = $submitAction;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
