<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $value;
    public $comparison;
    public $href;

    public function __construct($title, $value, $comparison = null, $href = '#')
    {
        $this->title = $title;
        $this->value = $value;
        $this->comparison = $comparison;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.stat-card');
    }
}
