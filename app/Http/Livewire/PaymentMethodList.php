<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentMethodList extends Component
{

    /* listeners */

    protected $listeners = ['render'];

    public function defaultPaymentMethod($paymentMethodId)
    {
        /* marcar un metodo de pago como predeterminado */      

        auth()->user()->updateDefaultPaymentMethod($paymentMethodId);
    }

    public function deletePaymentMethod($paymentMethodId)
    {
        /* recuperar metodo de pago */

        $paymentMethod = auth()->user()->findPaymentMethod($paymentMethodId);

        /* borrar metodo de pago */
        
        $paymentMethod->delete();
    }

    public function render()
    {
        $paymentMethods = auth()->user()->paymentMethods();

        return view('livewire.payment-method-list',compact('paymentMethods'));
    }
}
