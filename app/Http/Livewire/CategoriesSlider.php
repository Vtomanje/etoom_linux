<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoriesSlider extends Component
{

    public $categories;

    public function render()
    {
        return view('livewire.categories-slider');
    }
}
