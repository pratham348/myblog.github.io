<?php

namespace App\View\Components;

use Illuminate\View\Component;

class title extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $t;
    public function __construct($data)
    {
        //
        $this->t=$data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.title');
    }
}
