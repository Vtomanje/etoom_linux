<div>    
    {{-- plan --}}

    <div class="w-full max-w-4xl  mx-auto px-5 pt-10 text-gray-600 mb-10">
        <div class="text-center max-w-xl mx-auto">
            <h1 class="text-5xl md:text-6xl font-bold mb-5">Premium</h1>
            <h3 class="text-xl font-medium mb-10">
                activate your premium plan, and give more visibility to your products</h3>
        </div>
        
        <div class="max-w-4xl mx-auto md:flex">
            
            {{-- plan anual --}}
    
            <div class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-6 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                <div class="w-full flex-grow">
                    <h2 class="text-center font-bold uppercase mb-4">Annual Plan</h2>
                    <h3 class="text-center font-bold text-4xl mb-5">$59,99</h3>
                    <ul class="text-sm px-5 mb-8">
                        <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i>
                            - Possibility of associating a product to the main slider
                        </li>
                        <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> 
                            - Greater visibility of your services on the website
                        </li>                
                    </ul>
                </div>
                @livewire('subscriptions-premium', ['price' => "price_1M4rofFhVNRahIFwmegWdW7R"], key("price_1M4rofFhVNRahIFwmegWdW7R"))
                {{-- <x-button-subscription-premium name="Prueba premium" price="price_1LwWjmFhVNRahIFwxaXHQzBS"/> --}}
            </div>
        </div>
    </div>


    {{-- create --}}
    @livewire('payment-method-create-premium')

    <div class="my-8">
        @livewire('payment-method-list-premium')
    </div>
</div>