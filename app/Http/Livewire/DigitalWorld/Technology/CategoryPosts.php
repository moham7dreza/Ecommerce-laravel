<?php

namespace App\Http\Livewire\DigitalWorld\Technology;

use Livewire\Component;

class CategoryPosts extends Component
{


    public function render()
    {
        return view('livewire.digital-world.technology.category-posts')->extends('customer.layouts.master-one-col');
    }
}
