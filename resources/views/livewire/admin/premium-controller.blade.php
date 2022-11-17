<div>    
    <div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    
        <h1 class="text-3xl text-center font-semibold mb-8">complete this information to add one image to the main slider</h1>
    
       @if ($products->count() < 1)
       
       <div class="w-96 mx-auto mt-3">
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Attention!</strong>
            <span class="block sm:inline">you must have at least one product.</span>                  
        </div>

        @else
           <div>

            {{-- route --}}
            <div class="bg-white shadow-xl rounded-lg p-6 mb-4">

                <div class="flex justify-center items-center">
                    <img class="h-32 object-cover" src="{{ asset('images/none.png') }}" id="picture">
                </div>
            
                <div class="gri grid-cols-2">
                    <form action="{{ route('admin.premium.store') }}" method="POST" enctype="multipart/form-data">

                        <x-jet-label value="Products" />
                        <select class="w-full form-control" wire:model="product_id">
                            <option value="" selected disabled>Select a user product</option>
            
                            @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
            
                        <x-jet-input-error for="product_id" />


                            @csrf

                            <div class="flex justify-center">
                                    {{--  <div class="mb-4">
                                        <x-jet-label value="Route" />
                                        <x-jet-input name="route" type="text" class="w-full"
                                            placeholder="Enter route" accept="image/*" />
                                        <x-jet-input-error for="route" />
                                    </div>   --}}
                                    
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
       @endif
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
