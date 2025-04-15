<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $variant;
    public $disabled;
    public $size;
    public $href;
    public $asLink;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $variant = 'edit',
        $disabled = false,
        $size = 'md',
        $href = null,
        $asLink = false
    ) {
        $this->variant = $variant;
        $this->disabled = $disabled;
        $this->size = $size;
        $this->href = $href;
        $this->asLink = $href ? true : $asLink;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action-button');
    }

    public function buttonClasses()
    {
        $base = 'focus:outline-none flex shrink-0 items-center justify-center gap-2 rounded-lg border border-transparent text-white disabled:pointer-events-none disabled:opacity-50';

        // Size classes
        $sizes = [
            'sm' => 'size-7 text-xs',
            'md' => 'size-9.5 text-sm',
            'lg' => 'size-12 text-base'
        ];

        // Variant classes
        $variants = [
            'share' => 'bg-teal-600 hover:bg-teal-700 focus:bg-teal-700 dark:bg-teal-500 dark:hover:bg-teal-600 dark:focus:bg-teal-600',
            'edit' => 'bg-yellow-500 hover:bg-yellow-600 focus:bg-yellow-600 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:bg-yellow-700',
            'delete' => 'bg-red-600 hover:bg-red-700 focus:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:bg-red-600',
            'send' => 'bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:bg-blue-600',
            'download' => 'bg-green-600 hover:bg-green-700 focus:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:bg-green-600',
            'qr-code' => 'bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 dark:focus:bg-purple-600'
        ];

        return implode(' ', [
            $base,
            $sizes[$this->size] ?? $sizes['md'],
            $variants[$this->variant] ?? $variants['edit']
        ]);
    }

    /**
     * Get the icon SVG based on variant
     */
    public function iconSvg()
    {
        $icons = [
            'share' => '<path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line>',
            'edit' => '<path d="M17 3a2.85 2.85 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>',
            'delete' => '<path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>',
            'send' => '<path d="M22 2 11 13"></path><path d="M22 2 15 22 11 13 2 9 22 2Z"></path>',
            'download' => '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line>',
            'qr-code' => '<path d="M3 3h4v4H3V3Z"></path><path d="M17 3h4v4h-4V3Z"></path><path d="M17 17h4v4h-4v-4Z"></path><path d="M3 17h4v4H3v-4Z"></path><path d="M7 7h10v10H7V7Z"></path>'
        ];  

        return $icons[$this->variant] ?? $icons['edit'];
    }

    /**
     * Get the icon size class
     */
    public function iconSize()
    {
        return [
            'sm' => 'size-2',
            'md' => 'size-3',
            'lg' => 'size-4'
        ][$this->size] ?? 'size-3';
    }
}
