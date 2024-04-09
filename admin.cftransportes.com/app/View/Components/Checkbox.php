<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    public $name;
    public $label;
    public $model;
    public $disabled;

    public function __construct(
        $name = null,
        $label = null,
        $model = null,
        $disabled = null,
    )
    {
        $this->name = $name;
        $this->model = $model;
        $this->label = $label;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.checkbox');
    }
}
