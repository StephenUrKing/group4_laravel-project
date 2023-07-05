<?php

namespace App\View\Components\course;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class courseItem extends Component
{
    public $course;
    /**
     * Create a new component instance.
     */
    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.course.course-item');
    }
}
