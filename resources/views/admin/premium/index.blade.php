<x-admin-layout>
    <div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
                        
          {{--   @if ($premiumImages->count() >= 1) --}}

            @if (auth()->user()->subscribed('Prueba premium'))
              
                @if (auth()->user()->premiumImage)
                    
                    <h1 class="text-3xl text-center font-semibold mb-8">            
                        This image will be displayed in the main slider.            
                    </h1>
                            
                    <div>           
                        <table class="min-w-full divide-y divide-gray-400 mb-6 border rounded">
                            <thead class="bg-gray-200">
                                <tr>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Image
                                    </th>
                                
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Route
                                    </th>  
                                    
                                    
                                    <th scope="col text-center"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Show
                                    </th>  

                                    @if (auth()->user()->subscribed('Prueba premium') && auth()->user()->subscribed('Prueba'))

                                    
                                        <th scope="col text-center"
                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Edit
                                        </th>                      

                                    @endif
                                
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Delete
                                    </th>                                  
                                </tr>                                           
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($premiumImages as $premiumImage)                            
                                    <tr>
                                        {{-- imagen --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">                                        
                                                    <img class="h-10 w-10 rounded-full object-cover" 
                                                    src="{{ Storage::url($premiumImage->url) }}">                                           
                                                </div>                                        
                                            </div>
                                        </td>

                                        {{-- product name --}}
                                        <td class="px-6 py-4 whitespace-nowrap">

                                            @if ($premiumImage->route)
                                                <div class="text-sm text-gray-900">
                                                    {{ Str::limit($premiumImage->route) }}
                                                </div>
                                            @else
                                                <div class="text-sm text-red-400">
                                                    Dont exist route
                                                </div>
                                            @endif

                                            

                                        </td>

                                        {{-- show --}}

                                        @if ($premiumImage->product_id)
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                <a href="{{ route('products.show',$product) }}" 
                                                class="text-indigo-600 hover:text-indigo-900">Show</a>
                                            </td>    

                                            @else
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                <a href="/" 
                                                class="text-indigo-600 hover:text-indigo-900">show advertising</a>
                                            </td>  
                                        @endif                                                                   
                                                                                                            
                                        {{-- edit --}}

                                        @if (auth()->user()->subscribed('Prueba premium') && auth()->user()->subscribed('Prueba'))
                                            
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <a href="{{ route('admin.premium.edit',$premiumImage->id) }}" 
                                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                </td>                                                 

                                        @endif

                                        
                                        {{-- eliminar --}}

                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <form action="{{ route('admin.premium.delete',$premiumImage) }}" method="POST">
                                                @csrf
                                                <button  type="submit"
                                                class="text-indigo-600 hover:text-indigo-900">Delete</button>
                                            </form>

                                        </td>       
                                    </tr>    
                                @endforeach
                            </tbody>     
                            
                        </table>                        
                    </div>

                @else

                    <div class="bg-yellow-100 rounded-md border-yellow-500 text-yellow-700 p-4 flex justify-between items-center" role="alert">
                        <p>
                            you have not uploaded an advertising image yet
                        </p>

                        <a href="{{ route('admin.premium.create') }}" class="btn btn-primary">Create adversiting image</a>
                    </div>

                @endif

            @else
                
                <div class="mb-4">
                    <div class="bg-orange-100 rounded-md border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">Slider Image</p>
                        <p>In this place you can upload an image to be displayed in the main slider.</p>
                    </div>
                </div>

                <div class="flex justify-center">
                    <x-button-enlace href="{{ route('billing.premium') }}" class="cursor-pointer">                
                        I want to be premium
                    </x-button-enlace>
                </div>

            @endif         
        </div>        
    </div>
</x-admin-layout>