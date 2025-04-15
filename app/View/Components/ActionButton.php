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
            'edit' => 'bg-yellow-500 hover:bg-yellow-600 focus:bg-yellow-600 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:bg-yellow-700',
            'delete' => 'bg-red-600 hover:bg-red-700 focus:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:bg-red-600',
            'add' => 'bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:bg-blue-600',
            'view' => 'bg-green-600 hover:bg-green-700 focus:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:bg-green-600'
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
            'edit' => '<path d="M17 3a2.85 2.85 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>',
            'delete' => '<path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>',
            'add' => '<path d="M5 12h14"></path><path d="M12 5v14"></path>',
            'view' => '<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle>'
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
