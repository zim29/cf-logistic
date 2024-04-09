<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonPrimary extends Component
{
    public $type;
    public $label;
    public $fullSize;

    public function __construct($type, $label, $fullSize)
    {
        $this->type = $type;
        $this->label = $label;
        $this->fullSize = $fullSize;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-primary');
    }
}
