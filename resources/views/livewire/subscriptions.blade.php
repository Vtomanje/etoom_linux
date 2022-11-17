<div class="w-full">
    @if (auth()->user()->hasDefaultPaymentMethod())
    
        @if (auth()->user()->subscribed($name))
            @if (auth()->user()->subscribedToPrice($price, $name))

                {{-- Reanudar --}}
                @if (auth()->user()->subscription($name)->onGracePeriod())
                    <div>
                        <button 
                            wire:click="resuminSubscription"
                            wire:loading.attr="disabled"
                            wire:target="resuminSubscription"
                            class="font-bold bg-red-600 hover:bg-red-700 text-white rounded-md px-10 py-2 transition-colors w-full items-center justify-center">

                            <x-spinner 
                            wire:loading
                            wire:target="resuminSubscription"
                            w="6" h="6" class="mr-2" />
                            Resume plan
                        </button>        
                    </div>
                @else

                   <article>
                        <button 
                            wire:click="cancellingSubscription"
                            wire:loading.attr="disabled"
                            wire:target="cancellingSubscription"
                            class="font-bold bg-red-600 hover:bg-red-700 text-white rounded-md px-10 py-2 transition-colors w-full items-center justify-center">

                            <x-spinner 
                            wire:loading
                            wire:target="cancellingSubscription"
                            w="6" h="6" class="mr-2" />

                            Cancel
                        </button>
                   </article>

                @endif

            @else
                <button 
                    wire:click="changingPlans"
                    wire:loading.attr="disabled"
                    wire:target="changingPlans"
                    class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full items-center justify-center">

                    <x-spinner 
                    wire:loading
                    wire:target="changingPlans"
                    w="6" h="6" class="mr-2" />

                    Change plan
                </button>
            @endif
        @else

            <a 
                wire:click="newSubscription"
                wire:loading.attr="disabled"
                wire:target="newSubscription"
                class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full flex items-center justify-center cursor-pointer">

                <x-spinner 
                wire:loading
                wire:target="newSubscription"
                w="6" h="6" class="mr-2" />

                Subscribe
            </a>           

        @endif

    @else
        <button 
            class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full items-center justify-center">
            Add payment method
        </button>
    @endif
</div>