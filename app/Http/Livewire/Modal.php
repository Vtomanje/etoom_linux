<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    protected $listeners = ['emptySlide'];

    public $open = false;

    public function emptySlide()
    {
        $this->open = true;
    }

    public function close()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
