<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Anchor extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $to;

    public function __construct($to)
    {
        $this->to = $to;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.anchor');
    }
}
