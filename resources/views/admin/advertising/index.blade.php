<x-admin-layout>
    <div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

        @if ($premiumTestImages->count() >= 1)
    
        <h1 class="text-3xl text-center font-semibold mb-8">            
            These images will be displayed in the main slider.
        </h1>

                
        <div>       

           <div class="flex justify-end mb-2">
                <x-button-enlace href="{{ route('admin.advertising.create') }}">
                    Create
                </x-button-enlace>
           </div>

            <table class="min-w-full divide-y divide-gray-400 mb-6 border rounded">
                <thead class="bg-gray-200">
                    <tr>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Imagen
                        </th>
                    
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Ruta
                        </th>     
                        
                        <th scope="col text-center"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Editar
                        </th>  

                        
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Eliminar
                        </th>  

                      
                        {{-- <th scope="col" class="relative px-6 py-3">
                            <span >Editar</span>
                        </th>

                        <th scope="col" class="relative px-6 py-3">
                            <span >Eliminar</span>
                        </th> --}}
                    </tr>                                           
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($premiumTestImages as $premiumTestImage)                            
                        <tr>
                            {{-- imagen --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">                                        
                                        <img class="h-10 w-10 rounded-full object-cover" 
                                        src="{{ Storage::url($premiumTestImage->url) }}">                                           
                                    </div>                                        
                                </div>
                            </td>

                            {{-- product name --}}
                            <td class="px-6 py-4 whitespace-nowrap">

                                <div class="text-sm text-gray-900">
                                    {{ Str::limit($premiumTestImage->route) }}
                                </div>

                            </td>
                                                                                                
                            {{-- edit --}}

                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a href="{{ route('admin.advertising.edit',$premiumTestImage) }}" 
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>       
                            
                            {{-- eliminar --}}

                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <form action="{{ route('admin.advertising.delete',$premiumTestImage) }}" method="POST">
                                    @csrf
                                    <button  type="submit"
                                    class="text-indigo-600 hover:text-indigo-900">Delete</button>
                                </form>

                            </td>       
                        </tr>    
                    @endforeach
                </tbody>     
                
            </table> 
            {{ $premiumTestImages->links() }}
        </div>

        @else

        <h2 class="text-4xl text-center font-semibold mb-8">            
            You haven't uploaded a premium image yet.
        </h2>

        <div class="flex justify-center items-center">
            <x-button-enlace href="{{ route('admin.advertising.create') }}">
                Add image
            </x-button-enlace>
        </div>
        @endif

    </div>
</x-admin-layout>