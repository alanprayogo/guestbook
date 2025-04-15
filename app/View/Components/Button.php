<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public $href;
    public $type;
    public $icon;
    public $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href = '#', $type = 'primary', $icon = null, $disabled = false)
    {
        $this->href = $href;
        $this->type = $type;
        $this->icon = $icon;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }

    public function colorClasses()
    {
        $base = 'inline-flex items-center px-3 py-2 text-sm font-medium text-white border border-transparent rounded-lg focus:outline-none gap-x-2 disabled:pointer-events-none disabled:opacity-50';
        
        $colors = [
            'primary' => 'bg-blue-600 hover:bg-blue-700 focus:bg-blue-700',
            'secondary' => 'bg-gray-600 hover:bg-gray-700 focus:bg-gray-700',
            'danger' => 'bg-red-600 hover:bg-red-700 focus:bg-red-700',
            'success' => 'bg-green-600 hover:bg-green-700 focus:bg-green-700',
        ];

        return $base . ' ' . ($colors[$this->type] ?? $colors['primary']);
    }
}
