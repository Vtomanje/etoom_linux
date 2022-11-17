<x-admin-layout>
    <div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    
        <h1 class="text-3xl text-center font-semibold mb-8">complete this information to edit the image</h1>
    
        <div>

            <div class="bg-white shadow-xl rounded-lg p-6 mb-4">

                {{-- route --}}
                <form action="{{ route('admin.advertising.update',$premiumTestImage) }}" method="POST" enctype="multipart/form-data">
            
                    @csrf

                        <div class="flex justify-center items-center">
                            @isset($premiumTestImage->url)                                
                                    <img class="h-32 object-cover" src="{{ Storage::url($premiumTestImage->url) }}" id="picture">
                                @else
                                    <img class="h-32 object-cover" src="{{ asset('images/none.png') }}">
                            @endisset
                        </div>

                            <div class="grid grid-cols-2 items-center gap-4">
                                    <div class="mb-4">
                                        <x-jet-label value="Route" />
                                        <x-jet-input name="route" type="text" class="w-full"
                                            placeholder="Enter route" accept="image/*" 
                                            value="{{ $premiumTestImage->route }}"/>
                                        <x-jet-input-error for="route" />
                                    </div>  
                                    
                                    <div class="mb-4">
                                        <x-jet-label value="Image" />
                                        <x-jet-input name="file" type="file" class="w-full" id="file" value="{{ $premiumTestImage->url }}"/>
                                        <x-jet-input-error for="file" />
                                    </div>      
                            </div>            

                            {{-- image --}}
                            
                            <div class="mx-auto">
                                <img src="" alt="">
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
</x-admin-layout>