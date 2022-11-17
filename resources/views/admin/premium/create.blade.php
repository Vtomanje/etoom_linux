<x-admin-layout>
    <div>
        <div>
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        
            <h1 class="text-3xl text-center font-semibold mb-8">complete this information to add one image to the main slider</h1>               
               <div>
    
                {{-- route --}}
                <div class="bg-white shadow-xl rounded-lg p-6 mb-4">
    
                    <div class="flex justify-center items-center">
                        <img class="h-32 object-cover" src="{{ asset('images/none.png') }}" id="picture" style="height: 200px">
                    </div>
                
                    <div class="gri grid-cols-2">
                        <form action="{{ route('admin.premium.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                           @if (auth()->user()->subscribed('Prueba'))
                            <x-jet-label value="Products" />
                            <select class="w-full form-control" name="product_id">
                                <option value="" selected disabled>Select a user product</option>
                
                                @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                           @endif
                
                            <x-jet-input-error for="product_id" />        
    
                                <div class="flex justify-center">                                                                               
                                        <div class="mb-4 my-6">
                                            <x-jet-label value="Image" />
                                            <x-jet-input name="file" type="file" class="w-full" id="file"/>
                                            <x-jet-input-error for="file" />
                                        </div>      
                                </div>                
                                
                                <div class="mt-4 flex justify-end">
                                    <x-jet-button class="ml-auto" type="submit">
                                        Create
                                    </x-jet-button>
                                </div>   
                            
                        </form>
                    </div>
                </div>    
            </div>

           {{-- flash message --}}       
            
           @if (session('message'))
               <div>
                    <h2 class="text-center text-red-400">{{ session('message') }}</h2>
               </div>
           @endif
           
        </div>
 
        </div>
    
        @push('script')
            <script>
                document.getElementById('file').addEventListener('change',cambiarImagen);
    
                function cambiarImagen(event){
                    let file = event.target.files[0];
    
                    let reader = new FileReader();
    
                    reader.onload = (event) => {
                        document.getElementById('picture').setAttribute('src',event.target.result);
                    };
    
                    reader.readAsDataURL(file);
                }
            </script>
        @endpush
    </div>

</x-admin-layout>