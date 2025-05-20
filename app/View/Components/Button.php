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
    public $variant;
    public $icon;
    public $disabled;
    public $size;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $href = '#',
        $variant = 'primary',
        $icon = null,
        $disabled = false,
        $size = 'medium'
    ) {
        $this->href = $href;
        $this->variant = $variant;
        $this->icon = $icon;
        $this->disabled = $disabled;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }

    public function buttonClasses()
    {
        $base = 'inline-flex items-center border rounded-lg focus:outline-none disabled:pointer-events-none disabled:opacity-50 gap-x-2';

        // Size classes
        $sizes = [
            'small' => 'px-2.5 py-1.5 text-xs',
            'medium' => 'px-3 py-2 text-sm',
            'large' => 'px-4 py-2.5 text-base',
        ];

        // Variant classes
        $variants = [
            'primary' => 'bg-blue-600 hover:bg-blue-700 text-white border-transparent',
            'secondary' => 'bg-gray-100 hover:bg-gray-200 text-gray-800 border-gray-300',
            'danger' => 'bg-red-600 hover:bg-red-700 text-white border-transparent',
            'success' => 'bg-green-600 hover:bg-green-700 text-white border-transparent',
            'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white border-transparent',

            // Action-specific variants
            'add' => 'bg-indigo-600 hover:bg-indigo-700 text-white border-transparent',
            'scan-qr' => 'bg-purple-600 hover:bg-purple-700 text-white border-transparent',
            'export-excel' => 'bg-emerald-600 hover:bg-emerald-700 text-white border-transparent',
            'export-pdf' => 'bg-red-500 hover:bg-red-600 text-white border-transparent',
            'import-excel' => 'bg-teal-600 hover:bg-teal-700 text-white border-transparent',
            'random-pick' => 'bg-pink-600 hover:bg-pink-700 text-white border-transparent',
        ];

        return implode(' ', [
            $base,
            $sizes[$this->size] ?? $sizes['medium'],
            $variants[$this->variant] ?? $variants['primary']
        ]);
    }

    public function defaultIcons()
    {
        $icons = [
            'add' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" /></svg>',
            'scan-qr' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h3a1 1 0 010 2H6v3a1 1 0 01-2 0V4zm6 0a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-2 0V5h-2a1 1 0 01-1-1zm6 6a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 010-2h2v-2a1 1 0 011-1zm-8 2a1 1 0 100 2h2a1 1 0 100-2H7z" clip-rule="evenodd" /></svg>',
            'export-excel' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>',
            'export-pdf' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>',
            'import-excel' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm7.293-7.707a1 1 0 011.414 0L13 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>',
            'random-pick' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3C3.895 3 3 3.895 3 5v14c0 1.105.895 2 2 2h14c1.105 0 2-.895 2-2V5c0-1.105-.895-2-2-2H5zm1.5 4A1.5 1.5 0 118 8.5 1.5 1.5 0 016.5 7zm0 10A1.5 1.5 0 118 18.5 1.5 1.5 0 016.5 17zM12 12a1.5 1.5 0 111.5-1.5A1.5 1.5 0 0112 12zm5.5-5A1.5 1.5 0 1119 8.5 1.5 1.5 0 0117.5 7zm0 10A1.5 1.5 0 1119 18.5 1.5 1.5 0 0117.5 17z"/></svg>',
        ];

        return $icons[$this->variant] ?? null;
    }
}
