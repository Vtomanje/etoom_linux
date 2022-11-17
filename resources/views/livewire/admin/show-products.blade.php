<div>    

    @if (auth()->user()->subscribed('Prueba') || auth()->user()->hasRole('admin'))
        <x-slot name="header">
            <div class="flex items-center ">
                <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Produc List
                </h2>

                <x-button-enlace class="ml-auto" href="{{route('admin.products.create')}}">
                    Add Products
                </x-button-enlace>
            </div>
        </x-slot>  

        <div class="container py-12">                  

            <x-table-responsive>
                <div class="px-6 py-4 flex items-center">
                    <div>                
                        {{-- tipo de usuario --}}

                        <select wire:model="user_type_id">
                            <option value="" selected disabled>User type</option>
                            @foreach ($users_type as $user_type)                        
                                <option value="{{ $user_type }}">
                                    @if ($user_type == 1)
                                        No subscribed
                                    @else
                                        Subscribed
                                    @endif
                                </option>
                            @endforeach
                        </select>

                       {{-- filtro por usuarios --}}

                        <select wire:model="user_id">
                            <option value="" selected disabled>Select user</option>
                            @foreach ($users as $user)   
                                @if (!$user->hasRole('admin'))
                                    @if ($user_type_id == 2 && $user->subscribed('Prueba'))                                    
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @elseif($user_type_id == 1 && (!$user->subscribed('Prueba')))
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif         
                                @endif                                          
                            @endforeach
                        </select>     
                        
                        {{-- filtro por states --}}

                        <select wire:model="state_id">
                            <option value="" selected disabled>Select state</option>
                            @foreach ($states as $state)                        
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>    
                    </div>

                    {{-- buttons --}}
                    <div class="ml-auto">
                        <x-jet-button wire:click="deleteFilter">
                            Delete filter
                        </x-jet-button>

                        <x-jet-button wire:click="productsDraft('{{ $user_id }}', '{{ $state_id }}')" class="bg-red-500 hover:bg-red-400">
                            Draf
                        </x-jet-button>

                        <x-jet-button wire:click="productsPublished('{{ $user_id }}', '{{ $state_id }}')" class="bg-green-500 hover:bg-green-400">
                           Post
                        </x-jet-button>
                    </div>
                </div>

                {{-- table --}}
               
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Image
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                State
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                User
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Premium
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Show
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Edit
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">


                        @if ($products->count())                    
                            
                            @foreach ($products as $product)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @if ($product->images->count())
                                                    <img class="h-10 w-10 rounded-full object-cover"
                                                        src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                                @else
                                                    <img class="h-10 w-10 rounded-full object-cover"
                                                        src="https://images.pexels.com/photos/5961541/pexels-photo-5961541.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="">
                                                @endif
                                            </div>                                               
                                        </div>
                                    </td>
                                
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $product->name }}
                                        </div>

                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="text-sm text-gray-900">
                                            {{ $product->subcategory->category->name }}
                                        </div>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @switch($product->status)
                                            @case(1)
                                                <span wire:click="publishedStatus({{ $product->id }})"
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-700 cursor-pointer hover:bg-opacity-50">
                                                    Borrador
                                                </span>
                                            @break
                                            @case(2)
                                                <span wire:click="draftStatus({{ $product->id }})"
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 cursor-pointer hover:bg-opacity-80">
                                                    Publicado
                                                </span>
                                            @break
                                            @default

                                        @endswitch

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$product->user->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div>
                                            {{$product->user->subscribed('Prueba premium') ? 'si' : 'no'}}
                                        </div>
                                    </td>                                      

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div>
                                            <a href="{{ route('products.show', $product) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">Show</a>
                                        </div>
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div>
                                            <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </div>
                                    </td>
                                    
                                </tr>

                            @endforeach
                                               
                        @else                        
                            @if ($user_id != '' && !$products->count())

                            <tr class="bg-red-300">
                                <td class="text-center px-6 py-4 whitespace-nowrap" colspan="8">
                                    <h2 class="text-white font-semibold text-2xl">
                                        There are no products
                                    </h2>
                                </td>
                            </tr>                                    
                            @else
                            <tr class="bg-gray-200">
                                <td class="text-center px-6 py-4 whitespace-nowrap" colspan="8">
                                    <h2 class="text-gray-400 font-semibold text-2xl">
                                        select a type and one user to see the products
                                    </h2>
                                </td>
                            </tr>                                                   
                            @endif                           
                        @endif

                    </tbody>                   
                </table>
            </x-table-responsive>

            {{-- pagination --}}

            @if ($products->hasPages())
                {{ $products->links() }}
            @endif

        </div>
    @else
        <div class="flex justify-center items-center h-screen bg-gray-300">        
            <div class="bg-orange-100 rounded-md border-orange-500 text-orange-700 p-4" role="alert">
                <h1 class="text-4xl">            
                    Warning !
                </h1>
                <p class="mb-4">Your user is deactivated, please renew your subscription.</p>

                <div class="flex justify-center">
                    <x-button-enlace href="{{ route('billing.index') }}">
                        Renew Plan
                    </x-button-enlace>
                </div>
            </div>
        </div>     
    @endif
</div>