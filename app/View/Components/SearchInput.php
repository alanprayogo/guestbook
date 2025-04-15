<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $name;
    public $label;
    public $placeholder;
    public $class;

    public function __construct(
        $id = 'search-input',
        $name = 'search',
        $label = 'Search',
        $placeholder = 'Search...',
        $class = 'sm:col-span-1'
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-input');
    }
}
