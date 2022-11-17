<div class="card relative">

    {{-- spinner --}}

    <div wire:loading.flex class="justify-center items-center 
        absolute w-full h-full bg-gray-100 bg-opacity-50 z-30">
        <x-spinner w="20" h="20"/>
    </div>

    <div class="card-body">
        <table class="w-full">
            <thead>
                <tr class="text-left">
                    <th class="w-1/2 px-4 py-2">Date</th>
                    <th class="w-1/4 px-4 py-2">Dollars</th>
                    <th class="w-1/4 px-4 py-2"></th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse ($invoices as $invoice)                    
                    <tr>
                        <td class="px-4 py-3">{{ $invoice->date()->toFormattedDateString() }}</td>
                        <td class="px-4 py-3">{{ $invoice->total() }}</td>
                        <td class="px-4 py-3 text-right">
                            <a class="btn btn-primary" href="/user/invoice/{{ $invoice->id }}">Download</a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-3 text-gray-400 text-sm">
                            You don't have any invoice
                        </td>
                    </tr>
                    
                @endforelse

            </tbody>
        </table>
    </div>
</div>
