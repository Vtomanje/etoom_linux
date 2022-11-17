<div>   
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Products
                </h1>

                <x-jet-danger-button wire:click="$emit('deleteProduct')">
                    Delete
                </x-jet-danger-button>
            </div>
        </div>
    </header>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Complete this information to add your product</h1>

    <div class="mb-4" wire:ignore>
        <form action="{{ route('admin.products.files', $product) }}" method="POST" class="dropzone"
            id="my-awesome-dropzone"></form>
    </div>

    @if ($product->images->count())

        <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
            <h1 class="text-2xl text-center font-semibold mb-2">Imagenes del producto</h1>

            <ul class="flex flex-wrap">
                @foreach ($product->images as $image)

                    <li class="relative mr-3" wire:key="image-{{ $image->id }}">
                        <img class="w-32 h-20 object-cover" src="{{ Storage::url($image->url) }}" alt="">
                        <x-jet-danger-button class="absolute right-1 top-1"
                            wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled"
                            wire:target="deleteImage({{ $image->id }})">
                            x
                        </x-jet-danger-button>
                    </li>

                @endforeach

            </ul>
        </section>

    @endif


   {{--  @livewire('admin.status-product', ['product' => $product], key('status-product-' . $product->id)) --}}

    {{-- <div class="bg-white shadow-xl rounded-lg p-6">
    </div> --}}

    {{-- Nombre - slug status --}}
    <div class="bg-white shadow-xl rounded-lg grid grid-cols-2 gap-6 p-6 mb-4">
        <div class="mb-4">
            <x-jet-label value="Name" />
            <x-jet-input type="text" class="w-full" wire:model="product.name"
                placeholder="Ingrese el nombre del producto" />
            <x-jet-input-error for="product.name" />
        </div>

        {{-- Slug --}}
        <div class="mb-4">
            <x-jet-label value="Slug" />
            <x-jet-input type="text" disabled wire:model="slug" class="w-full bg-gray-200"
                placeholder="Ingrese el slug del producto" />

            <x-jet-input-error for="slug" />
        </div>       

        {{-- status --}}

       {{--  <div>
            <x-jet-label value="Status" />
            <select class="w-full form-control" wire:model="status_id">
                <option value="" selected disabled>Seleccione un status</option>

                @foreach ($status as $st)
                    <option value="{{ $st}}">
                        @if ($st == 1)
                            Borrador
                        @elseif($st == 2)
                            Publicar
                        @endif
                    </option>
                @endforeach
                
            </select>

            <x-jet-input-error for="status_id" />
        </div> --}}
    </div>

    {{-- address --}}

    <div class="bg-white rounded-lg shadow-lg p-4 mb-4 h-28">

        <div class="flex-1">
            <x-jet-label value="address" />
            <x-jet-input type="text" 
                        class="w-full"
                        wire:model="address"
                        placeholder="Enter address (optional)" />
            <x-jet-input-error for="address" />
        </div>

    </div>

    {{-- phone number - mail --}}
    <div class="bg-white shadow-xl rounded-lg grid grid-cols-2 gap-6 p-6 mb-4">
        <div class="mb-4">
            <x-jet-label value="Phone Number" />
            <x-jet-input type="text" class="w-full" wire:model="product.phone_number"
                placeholder="Enter phone number" />
            <x-jet-input-error for="product.phone_number" />
        </div>

        {{-- mail --}}
        <div class="mb-4">
            <x-jet-label value="Mail" />
            <x-jet-input type="text" class="w-full" wire:model="product.mail"
                placeholder="Enter mail" />
            <x-jet-input-error for="product.mail" />
        </div>
    </div>


    {{-- filling number - business type --}}
    <div class="bg-white shadow-xl rounded-lg grid grid-cols-2 gap-6 p-6 mb-4">
        <div class="mb-4">
           {{-- filling number --}}
            <x-jet-label value="Filling number" />
            <select class="w-full form-control" wire:model="product.filling_number_id">
                <option value="" selected disabled>Select a Filling number</option>

                @foreach ($filling_numbers as $filling_number)
                    <option value="{{ $filling_number->id }}">{{ $filling_number->number }}</option>
                @endforeach
            </select>

            <x-jet-input-error for="product.filling_number_id" />
        </div>

        {{-- business type --}}
        <div class="mb-4">
            <x-jet-label value="Business type" />
            <x-jet-input type="text" class="w-full" wire:model="product.business_type"
                placeholder="Enter business type" />
            <x-jet-input-error for="product.business_type" />
        </div>
    </div>


    <div class="bg-white shadow-xl rounded-lg grid grid-cols-2 gap-6 p-6 mb-4">

            {{-- Categoría --}}
            <div>
                <x-jet-label value="Categories" />
                <select class="w-full form-control" wire:model="category_id">
                    <option value="" selected disabled>Seleccione una categoría</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <x-jet-input-error for="category_id" />
            </div>

            {{-- Subcategoría --}}
            <div>
                <x-jet-label value="Subcategories" />
                <select class="w-full form-control" wire:model="product.subcategory_id">
                    <option value="" selected disabled>Seleccione una subcategoría</option>

                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>

                <x-jet-input-error for="product.subcategory_id" />
            </div>
    </div>

    {{-- Descrición --}}
    <div class="mb-4">
        <div wire:ignore>
            <x-jet-label value="Description" />
            <textarea class="w-full form-control" rows="4" wire:model="product.description" x-data x-init="ClassicEditor.create($refs.miEditor)
                .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('product.description', editor.getData())
                    })
                })
                .catch( error => {
                    console.error( error );
                } );" x-ref="miEditor">
            </textarea>
        </div>
        <x-jet-input-error for="product.description" />
    </div>

    {{-- states, cities, counties --}}

    <div class="flex bg-white rounded-lg shadow-lg gap-6 p-4 mb-4 h-28">
    
        {{-- states --}}
        <div class="flex-1">
            <x-jet-label value="States" />
            <select class="w-full form-control" wire:model="department_id">
                <option value="" selected disabled>Select a state</option>

                @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="department_id" />
        </div>

        {{-- cities --}}

        <div class="flex-1">
            <x-jet-label value="Cities" />
            <select class="w-full form-control" wire:model="city_id">
                <option value="" selected disabled>Select a city</option>

                @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="city_id" />
        </div>

         {{-- zip code --}}
        <div class="flex-1">
            <x-jet-label value="Zip code" />
            <x-jet-input type="number" 
                        class="w-full"
                        wire:model="product.zip_code"
                        placeholder="Enter zip code" />
            <x-jet-input-error for="product.zip_code" />
        </div>
       
    </div>

     {{-- redes sociales --}}

    <div class="flex bg-white rounded-lg shadow-lg gap-6 p-4 mb-4 h-28">

        {{-- facebook --}}
        <div class="mb-4 flex-1">
            <x-jet-label value="Facebook" />
            <x-jet-input type="text" 
                        class="w-full"
                        wire:model="facebook"
                        placeholder="Enter facebook" />
            <x-jet-input-error for="facebook" />
        </div>

        {{-- instagram --}}
        <div class="mb-4 flex-1">
            <x-jet-label value="Instagram" />
            <x-jet-input type="text" 
                        class="w-full"
                        wire:model="instagram"
                        placeholder="Enter instagram" />
            <x-jet-input-error for="instagram" />
        </div>

        {{-- twitter --}}
        <div class="mb-4 flex-1">
            <x-jet-label value="Twitter" />
            <x-jet-input type="text" 
                        class="w-full"
                        wire:model="twitter"
                        placeholder="Enter twitter" />
            <x-jet-input-error for="twitter" />
        </div>
       
    </div>
   
    <div class="flex justify-end items-center mt-4">

        <x-jet-action-message class="mr-3" on="saved">
            Updated
        </x-jet-action-message>

        <x-jet-button 
        wire:loading.attr="disabled"
            wire:target="save" 
            wire:click="save">
            Update product
        </x-jet-button>
    </div>
    

    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "add up to 8 images",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete: function(file) {
                    this.removeFile(file);
                },
                queuecomplete: function() {
                    Livewire.emit('refreshProduct');
                }
            };
            Livewire.on('deleteProduct', () => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.edit-product', 'delete');
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })            
        </script>
    @endpush
</div>