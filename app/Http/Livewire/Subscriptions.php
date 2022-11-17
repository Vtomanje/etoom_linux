<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Laravel\Cashier\Exceptions\IncompletePayment;


class Subscriptions extends Component
{

    protected $listeners = ['render'];

    /* properties */

    public $price;
    public $name = "Prueba";

    public function mount($price)
    {
        $this->price = $price;
    }


    public function newSubscription()
    { 
        try {
            auth()->user()->newSubscription($this->name,$this->price)
            ->create();        

            /* emitimos un evento al componente Invoices */

            $this->emitTo('invoices','render');
            $this->emitTo('subscriptions','render');

            return redirect()->route('admin.products.create');
            
        } catch (IncompletePayment $exception) {
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('billing.index')]
            );
        }   
    }

    public function changingPlans()
    {
        auth()->user()->subscription($this->name)->swap($this->price);

        /* emitimos un evento al componente Invoices */

        $this->emitTo('invoices','render');
        $this->emitTo('subscriptions','render');

        return redirect()->route('admin.products.create');
        
    }

    public function cancellingSubscription()
    {
        auth()->user()->subscription($this->name)->cancel();
        $this->emitTo('subscriptions','render');
    }

    public function resuminSubscription()
    {
        auth()->user()->subscription($this->name)->resume();
        $this->emitTo('subscriptions','render');

        return redirect()->route('admin.products.create');

    }

    public function render()
    {        
        return view('livewire.subscriptions');
    }
}
