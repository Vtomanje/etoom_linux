<div>
    <div class="p-6 h-full w-full container flex justify-center items-center flex-col m-9">
        <div class="card">
            <h2 class="text-center mb-3 text-3xl font-semibold capitalize">Upload premium image</h2>    

            {{-- image  --}}

            @if ($auth_user->premiumImage)                
               {{--  @livewire('admin.premium-image', ['auth_user' => $auth_user]) --}}

               <div class="mb-4">
                    <ul class="flex flex-wrap gap-2 justify-center">
                        <li class="relative">
                            <img class="w-32 h-20 object-cover border" src="{{ Storage::url($auth_user->premiumImage->url )}}">
                            <x-jet-danger-button class="absolute top-0 right-0" style="width: 25px;height: 25px;"
                            wire:click="deleteImage()"
                            wire:loading.attr="disabled"
                            wire:target="deleteImage()"
                            >x</x-jet-danger-button>
                        </li>
                    </ul>
                </div>
            @endif
                                            
            <form action="{{ route('admin.premium.store') }}" method="POST" class="dropzone"
            id="my-awesome-dropzone" style="width: 700px;height:200px;"></form>                    

            <div class="w-96 mx-auto mt-3">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">User can only upload one image!</strong>
                    <span class="block sm:inline">In this place you can upload an image that will be displayed in the main slider.</span>                  
            </div>
                
            </div>
        </div>        
    </div>
    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "add up 1 image",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                /* complete: function(file) {
                    this.removeFile(file);
                }, */
                queuecomplete: function() {
                    Livewire.emit('refresh');
                }
            };     
        </script>
    @endpush
</div>
