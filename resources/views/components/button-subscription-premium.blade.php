@props(['name', 'price'])

<div class="w-full">
    @if (auth()->user()->hasDefaultPaymentMethod())
    
        @if (auth()->user()->subscribed($name))
            @if (auth()->user()->subscribedToPrice($price, $name))

                {{-- Reanudar --}}
                @if (auth()->user()->subscription($name)->onGracePeriod())
                    
                    <button wire:click="resuminSubscription('{{$name}}')"
                        wire:loading.remove
                        wire:target="resuminSubscription('{{$name}}')"
                        class="font-bold bg-red-600 hover:bg-red-700 text-white rounded-md px-10 py-2 transition-colors w-full items-center justify-center">
                        Resume plan
                    </button>

                    <button wire:loading.flex
                        wire:target="resuminSubscription('{{$name}}')"
                        class="font-bold bg-red-600 hover:bg-red-700 text-white rounded-md px-10 py-2 transition-colors w-full items-center justify-center">
                        <x-spinner w="6" h="6" class="mr-2" />
                        Resume plan
                    </button>


                @else

                    <button wire:click="cancellingSubscription('{{$name}}')"
                        wire:loading.remove
                        wire:target="cancellingSubscription('{{$name}}')"
                        class="font-bold bg-red-600 hover:bg-red-700 text-white rounded-md px-10 py-2 transition-colors w-full items-center justify-center">
                        Cancel
                    </button>

                    <button wire:loading.flex
                        wire:target="cancellingSubscription('{{$name}}')"
                        class="font-bold bg-red-600 hover:bg-red-700 text-white rounded-md px-10 py-2 transition-colors w-full items-center justify-center">
                        <x-spinner w="6" h="6" class="mr-2" />
                        Cancel
                    </button>
                @endif

            @else
                <button wire:click="changingPlans('{{$name}}', '{{$price}}')"
                    wire:loading.remove
                    wire:target="changingPlans('{{$name}}', '{{$price}}')"
                    class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full items-center justify-center">
                    Change plan
                </button>

                <button wire:loading.flex
                    wire:target="changingPlans('{{$name}}', '{{$price}}')"
                    class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full items-center justify-center">
                    <x-spinner w="6" h="6" class="mr-2" />
                    Change plan
                </button>
            @endif
        @else

            <button wire:click="newSubscription('{{$name}}', '{{$price}}')"
                wire:loading.remove
                wire:target="newSubscription('{{$name}}', '{{$price}}')"
                class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full flex items-center justify-center">
                Subscribe
            </button>

            <button wire:loading.flex
                wire:target="newSubscription('{{$name}}', '{{$price}}')"
                class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full items-center justify-center">
                <x-spinner  w="6" h="6" class="mr-2" />
                Subscribe                
            </button>

        @endif

    @else
        <button 
            class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full items-center justify-center">
            Add payment method
        </button>
    @endif
</div>