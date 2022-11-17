<x-admin-layout>
    
    <div class="pb-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- billing --}}

        @livewire('billing')
        
        
       {{-- invoices --}}
       
        <div class="my-8">
            @livewire('invoices')
        </div>
    </div>
    
</x-admin-layout>