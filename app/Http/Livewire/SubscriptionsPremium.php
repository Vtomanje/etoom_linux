<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Laravel\Cashier\Exceptions\IncompletePayment;

class SubscriptionsPremium extends Component
{
    protected $listeners = ['render'];

    /* properties */

    public $price;
    public $name = "Prueba premium";

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

            $this->emitTo('invoices-premium','render');

            return redirect()->route('admin.premium.create');
            
        } catch (IncompletePayment $exception) {
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('billing.premium')]
            );
        }   
    }

    public function changingPlans()
    {
        auth()->user()->subscription($this->name)->swap($this->price);

        /* emitimos un evento al componente Invoices */

        $this->emitTo('invoices-premium','render');

        return redirect()->route('admin.premium.index');

    }

    public function cancellingSubscription()
    {
        auth()->user()->subscription($this->name)->cancel();
    }

    public function resuminSubscription()
    {
        auth()->user()->subscription($this->name)->resume();

        return redirect()->route('admin.premium.index');
    }

    public function render()
    {
        return view('livewire.subscriptions-premium');
    }
}
