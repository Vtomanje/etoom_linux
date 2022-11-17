<div>
    <section class="card relative">
        {{-- spinner --}}

        <div wire:loading.flex class="justify-center items-center 
        absolute w-full h-full bg-gray-100 bg-opacity-50 z-30">
            <x-spinner w="20" h="20"/>
        </div>


        <div class="px-6 py-4 bg-gray-50">
            <h1 class="text-gray-700 text-lg font-bold">
                Added payment methods
            </h1>
        </div>

        <div class="card-body divide-y divide-gray-200">
            {{-- en esta variable $paymentMethod, vamos a tener toda la informacion de la tarjeta que necesitamos mostrar --}}
            @forelse ($paymentMethods as $paymentMethod)
                <article class="flex justify-between items-center text-sm text-gray-700 py-2">
                    <div>
                        <h1>
                            <span class="font-bold">
                                {{ $paymentMethod->billing_details->name }}    
                            </span> 
                                xxxx-{{ $paymentMethod->card->last4 }}

                            @if ($paymentMethod->id == auth()->user()->defaultPaymentMethod()->id)
                                <span class="text-yellow-400">(Default)</span>
                            @endif
                        </h1>

                        {{-- expire --}}

                        <p>Expires: {{ $paymentMethod->card->exp_month }}/{{ $paymentMethod->card->exp_year }}</p>                    
                    </div>

                    <div class="grid grid-cols-2 border border-gray-200 rounded divide-x divide-gray-200">
                        @unless ($paymentMethod->id == auth()->user()->defaultPaymentMethod()->id)
                            {{-- star --}}
                            <i 
                            class="fas fa-star {{ $paymentMethod->id == auth()->user()->defaultPaymentMethod()->id ? 'text-yellow-400 hover:text-yellow-400' : 'text-gray-400'}}  cursor-pointer p-3" 
                            wire:click="defaultPaymentMethod('{{ $paymentMethod->id }}')"
                            >
                            </i>

                            {{-- trash --}}
                            <i 
                            class="fas fa-trash text-gray-400 cursor-pointer p-3 hover:text-red-400" 
                            wire:click="deletePaymentMethod('{{ $paymentMethod->id }}')"
                            >
                            </i>
                        @endunless
                    </div>
                </article>

                @empty

                <article class="p-2">
                    <h1 class="text-gray-400 text-sm">You do not have any payment method</h1>
                </article>

            @endforelse         
        </div>
    </section>
</div>
