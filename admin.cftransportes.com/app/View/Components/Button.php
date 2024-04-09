<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $label;
    public $color;
    public $fullSize;
    public $class;
    public $model;

    public function __construct($type, $label, $color, $fullSize, $class='', $model=null)
    {
        $this->type = $type;
        $this->label = $label;
        $this->color = $color;
        $this->fullSize = $fullSize;
        $this->class = $class;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
