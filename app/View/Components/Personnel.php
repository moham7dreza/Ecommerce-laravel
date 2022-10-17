<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;


class Personnel extends Component
{
    public Collection $personnel;
    /**
     * Create a new component instance.
     * @param  Collection  $personnel
     * @return void
     */
    public function __construct($personnel)
    {
        $this->personnel = $personnel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('it-city.layouts.components.personnel');
    }
}
