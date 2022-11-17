<div>
    <article class="card relative">

        {{-- spinner --}}

        <div wire:loading.flex="paymentMethodCreate" class="justify-center items-center 
        absolute w-full h-full bg-gray-100 bg-opacity-50 z-30
        "
        >
            <x-spinner w="20" h="20"/>
        </div>


        <form id="card-form">

            {{-- card-body --}}

            <div class="card-body">

                <h1 class="text-gray-700 text-lg font-bold mb-4">Add payment method</h1>

                <div class="flex">
                    <p class="text-gray-700">card info</p>
                    <div class="flex-1 ml-6">
                        <div class="form-group">
                            <input class="form-control" id="card-holder-name" type="text" 
                            placeholder="Cardholder name" required>
                        </div>
            
                        <!-- Stripe Elements Placeholder -->
                        <div class="form-control mb-1">
                                <div id="card-element"></div>
                        </div>

                        {{-- si la validacion de la tarjeta falla, se muestra este mensaje --}}

                        <span id="cardError" class="invalid-feedback"></span>
                    </div>
                </div>
            </div>

            {{-- card-footer --}}

            <div class="card-footer bg-gray-50 flex justify-end">
                <button
                  wire:loading.attr="disabled"   
                  wire:target="paymentMethodCreate"   
                  class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">
                    <span class="font-semibold">Update Payment Method</span>
                </button>
            </div>

        </form>

    </article>
    {{-- js --}}

    @push('script')

        <script>

            /* ejecutamos la funcion stripe una vez livewire halla cargado*/

            document.addEventListener('livewire:load',function(){
                stripe()
            })

            // Así se escucha un evento de livewire desde un script

            /* este evento vuelve a ejecutar la funcion stripe() */

            Livewire.on('resetStripe',function(){
                document.getElementById('card-form').reset()
                stripe()
            })
        </script>


        <script>

            function stripe(){
                /* la biblioteca Stripe.js se puede usar para adjuntar un elemento Stripe al formulario y recopilar de forma segura los detalles de pago del cliente */
                const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        
                const elements = stripe.elements();
                const cardElement = elements.create('card');
            
                cardElement.mount('#card-element');

                /* la tarjeta se puede verificar y un "identificador de método de pago" seguro se puede recuperar de Stripe usando el método confirmCardSetup de Stripe */

                const cardHolderName = document.getElementById('card-holder-name');
                const cardButton = document.getElementById('card-button');
                const cardForm = document.getElementById('card-form');
                const clientSecret = cardButton.dataset.secret;
                
                cardForm.addEventListener('submit', async (e) => {
                    e.preventDefault()
                    const { setupIntent, error } = await stripe.confirmCardSetup(
                        clientSecret, {
                            payment_method: {
                                card: cardElement,
                                billing_details: { name: cardHolderName.value }
                            }
                        }
                    );
                
                    if (error) {
                        /* la validacion falla */
                        document.getElementById('cardError').textContent = error.message
                    } else {
                        /* si la validacion es satisfactoria, emitimos un evento al componente payment-method-create con el token que nos devuelve stripe */

                        Livewire.emit('paymentMethodCreate',setupIntent.payment_method)
                    }
                });
            }
        </script>
    @endpush
</div>
