<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentMethodCreate extends Component
{

    /* una vez escuchado el evento, desencadenamos una accion */
    protected $listeners = ['paymentMethodCreate'];

    /* accion (El evento que escuchamos tiene un segundo parametro que es el token) por tanto debemos recibir esa informacion en la funcion */

    public function paymentMethodCreate($paymentMethod)
    {

        /* comprobar si el usuario a agregado metodos de pago */

        if (auth()->user()->hasPaymentMethod()) {
            
            /* aqui se agrega un nuevo metodo de pago para el usuario */
            auth()->user()->addPaymentMethod($paymentMethod);
        }else{

            /* aqui se agrega el primer metodo de pago que agregue el usaurio, como el predeterminado */
            auth()->user()->updateDefaultPaymentMethod($paymentMethod);
        }   

        /* se emite un evento al componente payment-method-list para que se muestre metodo de pago agregado en la lista */

        $this->emitTo('payment-method-list','render');

        /* se emite un evento al componente subscriptions para renderizar y mostrar los cambios en los botones de las tarjetas */

        $this->emitTo('subscriptions','render');
    
    }

    public function render()
    {   

        // ! cuando el componente se renderiza, el javascript que tengamos dentro de el, lo debemos volver a ejecutar.

        /* emitimos un evento para volver a cargar el script de stripe, para que el campo donde se ingresa la tarjeta vuelva a aparecer */

        $this->emit('resetStripe');

        /* le pasamos a la vista la intención */

        return view('livewire.payment-method-create',[
            'intent' => auth()->user()->createSetupIntent()
        ]);
    }
}
