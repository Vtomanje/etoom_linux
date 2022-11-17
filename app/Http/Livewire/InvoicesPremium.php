<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InvoicesPremium extends Component
{
    /* listeners */

    protected $listeners = ['render'];

    public function render()
    {
        $invoices = auth()->user()->invoices();

        return view('livewire.invoices-premium',compact('invoices'));
    }
}
