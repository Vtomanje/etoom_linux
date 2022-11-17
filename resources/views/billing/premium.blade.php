<x-admin-layout>
    <div class="pb-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- billing premium --}}

        @livewire('billing-premium')
        
        
       {{-- invoices premium --}}
       
        <div class="my-8">
            @livewire('invoices-premium')
        </div>
    </div>
</x-admin-layout>