<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    public $name;
    public $value;
    public $model;
    public $tabindex;
    public $class;
    public $disabled;
    public $label;
    public $type;

    public function __construct(
            $name = null, 
            $value = null, 
            $model = null, 
            $tabindex = null, 
            $class = 'form-control', 
            $disabled = false, 
            $label = null,
            $type = null
    )
    {
        $this->name = $name;
        $this->value = $value;
        $this->model = $model;
        $this->tabindex = $tabindex;
        $this->class = $class;
        $this->disabled = $disabled;
        $this->label = $label;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field');
    }
}
