<div>
    {{-- plans --}}

    <div class="w-full mx-auto px-5 py-10 text-gray-600 mb-10">
        <div class="text-center max-w-xl mx-auto">
            <h1 class="text-5xl md:text-6xl font-bold mb-5">Pricing</h1>
            <h3 class="text-xl font-medium mb-10">
                Acquire a plan and obtain the benefits it offers you, to further enhance the visibility of your services
            </h3>
        </div>
        
        <div class="max-w-4xl mx-auto md:flex">
            
            {{-- plan mensual --}}
    
            <div class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-6 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                <div class="w-full flex-grow">
                    <h2 class="text-center font-bold uppercase mb-4">Monthly plan</h2>
                    <h3 class="text-center font-bold text-4xl mb-5">$1,99</h3>
                    <ul class="text-sm px-5 mb-8">
                        <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Basic plan</li>
                        
                        <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i>The user can create one ad</li>
                        <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i>Associate one product to ad</li>
                    </ul>
                </div>
                @livewire('subscriptions', ['price' => "price_1M4rmwFhVNRahIFwhb2pN6uw"], key("price_1M4rmwFhVNRahIFwhb2pN6uw"))
                {{-- <x-button-subscription name="Prueba" price="price_1Ls6UOFhVNRahIFwcRuDZh3P"/> --}}
            </div>
    
            {{-- plan trimestral --}}
    
            <div class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:-mx-3 md:mb-0 rounded-md shadow-lg shadow-gray-600 md:relative md:z-50 md:flex md:flex-col">
                <div class="w-full flex-grow">
                    <h2 class="text-center font-bold uppercase mb-4">Biannual plan</h2>
                    <h3 class="text-center font-bold text-4xl md:text-5xl mb-5">$7,99</h3>
                    <ul class="text-sm px-5 mb-8">
                        <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Basic plan + quarterly plan</li>
                        <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> The user can create two ads</li>
                        <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Associate two products to ads</li>    
                    </ul>
                </div>
                @livewire('subscriptions', ['price' => "price_1Ls6UOFhVNRahIFwq44cBhfN"], key("price_1Ls6UOFhVNRahIFwq44cBhfN"))
                {{-- <x-button-subscription name="Prueba" price="price_1Ls6UOFhVNRahIFwq44cBhfN"/> --}}
            </div>
    
            {{-- plan anual --}}
    
            <div class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-6 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                <div class="w-full flex-grow">
                    <h2 class="text-center font-bold uppercase mb-4">Annual plan</h2>
                    <h3 class="text-center font-bold text-4xl mb-5">$11,99</h3>
                    <ul class="text-sm px-5 mb-8">
                        <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Basic plan + quarterly plan + yearly plan</li>
                        <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> The user can create three ads</li>
                        <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Associate three products to ads</li>     
                    </ul>
                </div>
                @livewire('subscriptions', ['price' => "price_1Ls6UPFhVNRahIFwIvpjx0DP"], key("price_1Ls6UPFhVNRahIFwIvpjx0DP"))
                
                {{-- <x-button-subscription name="Prueba" price="price_1Ls6UPFhVNRahIFwIvpjx0DP"/> --}}
            </div>
        </div>
    </div>

    {{-- create --}}
    
    @livewire('payment-method-create')

    <div class="my-8">
        @livewire('payment-method-list')            
    </div>
</div>