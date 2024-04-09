<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectField extends Component
{
    public $name;
    public $model;
    public $tabindex;
    public $class;
    public $disabled;
    public $label;
    public $options;
    public $selected;

    public function __construct(
            $name = null, 
            $model = null, 
            $tabindex = null, 
            $class = 'form-control', 
            $disabled = false, 
            $label = null, 
            $options = [], 
            $selected = null
    )
    {
        $this->name = $name;
        $this->model = $model;
        $this->tabindex = $tabindex;
        $this->class = $class;
        $this->disabled = $disabled;
        $this->label = $label;
        $this->options = $options;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-field');
    }
}
