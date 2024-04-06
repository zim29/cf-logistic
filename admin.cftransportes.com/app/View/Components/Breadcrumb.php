<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $route;
    public $items;
    public $lastItem;
    public $title;

    public function __construct($route, $title)
    {
        $this->items = explode(',', $route);
        $this->lastItem = array_pop($this->items);
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb');
    }
}
