<div>       
  
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
  
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">       
        <x-table-responsive>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Users Type
                            </th>     
                            
                            <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Number
                        </th>   
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">                                  

                            <tr class="divide-x border border-gray-200">
                             
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-md text-gray-900 font-semibold">
                                        Users register 
                                    </div>

                                </td>    
                                
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-md text-gray-900 font-semibold">
                                        {{ $users_registered }}
                                    </div>

                                </td>                                                                    
                            </tr>                               
                            
                            <tr class="divide-x border border-gray-200 bg-gray-100">
                             
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-md text-gray-900 font-semibold">
                                        Users with products 
                                    </div>

                                </td>    
                                
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-md text-gray-900 font-semibold">
                                        {{ $users_with_products }}
                                    </div>

                                </td>                                                                    
                            </tr>    

                            <tr class="divide-x border border-gray-200">
                             
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-md text-gray-900 font-semibold">
                                        Users without products 
                                    </div>

                                </td>    
                                
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-md text-gray-900 font-semibold">
                                        {{ $users_without_products }}
                                    </div>

                                </td>                                                                    
                            </tr>    
                            
                            {{-- premium users --}}

                            <tr class="divide-x border border-gray-200 bg-gray-100">
                             
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-md text-gray-900 font-semibold">
                                        Premium users
                                    </div>

                                </td>    
                                
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-md text-gray-900 font-semibold">
                                        {{ $premium_users }}
                                    </div>

                                </td>                                                                    
                            </tr>    

                            {{-- users subscriptions --}}

                            <tr class="divide-x border border-gray-200">
                             
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-md text-gray-900 font-semibold">
                                        Users with subscription
                                    </div>

                                </td>    
                                
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-md text-gray-900 font-semibold">
                                        {{ $users_with_subscription }}
                                    </div>

                                </td>                                                                    
                            </tr>    

                        <!-- More people... -->
                    </tbody>
                </table>                                      
        </x-table-responsive>       
    </div> 
</div>
