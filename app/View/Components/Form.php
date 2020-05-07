<?php

namespace App\View\Components;

use App\MenuItem;
use Illuminate\View\Component;

class Form extends Component
{
    public  $item;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(MenuItem $item = null)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form');
    }
}
