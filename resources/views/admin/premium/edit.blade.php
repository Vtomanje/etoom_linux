<x-admin-layout>
    <div>
        <div>
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        
            <h1 class="text-3xl text-center font-semibold mb-8">complete this information to edit the image</h1>
        
           @if ($products->count() < 1)
           
           <div class="w-96 mx-auto mt-3">
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Attention!</strong>
                <span class="block sm:inline">you must have at least one product.</span>                                  
            </div>

           <div class="flex justify-center">
                <div class="mt-5">
                    <a href="{{ route('admin.products.create') }}" class="bg-sky-400 py-2 px-4 rounded-md cursor-pointer">
                        Create product
                    </a>
                </div>
           </div>
    
            @else
               <div>
    
                {{-- route --}}
                <div class="bg-white shadow-xl rounded-lg p-6 mb-4">
    
                    <div class="flex justify-center items-center">
                        <img class="h-32 object-cover" src="{{ Storage::url($premiumImage->url) }}" id="picture" style="height: 200px">
                    </div>
                
                    <div class="gri grid-cols-2">
                        <form action="{{ route('admin.premium.update',$premiumImage) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <x-jet-label value="Products" />

                            <select class="w-full form-control" name="product_id">
                                <option value="" selected >Select a user product</option>
                
                                @foreach ($products as $product)
                                    <option value="{{$product->id}}" @if($product->id=== $premiumImage->product_id) selected='selected' @endif>{{$product->name}}</option>
                                @endforeach
                            </select>
                
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
                                    Update
                                </x-jet-button>
                            </div>                           
                        </form>
                    </div>
                </div>    
            </div>
           @endif

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