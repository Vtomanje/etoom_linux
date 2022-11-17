<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    
    <h1 class="text-3xl text-center font-semibold mb-8">Fill in the information to create your advertsing space</h1>
    
    {{-- users only for admin --}}       
        
    @if ($auth_user->hasRole('admin'))
        <div class="bg-white rounded-lg shadow-lg p-4 mb-4 h-28">      
            <div class="flex-1">
                <x-jet-label value="Select user" />
                <select class="w-full form-control" wire:model="user_id">
                    <option value="" selected disabled>Select a user</option>
    
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
    
                <x-jet-input-error for="user_id" />
            </div>
        </div>
    @endif

    {{-- name slug --}}
    <div class="bg-white rounded-lg shadow-lg  grid grid-cols-2 gap-6 p-4 mb-4 h-28">
            
        {{-- name --}}
        <div class="mb-4">
            <x-jet-label value="Name" />
            <x-jet-input type="text" 
                        class="w-full"
                        wire:model="name"
                        placeholder="Enter business name" />
            <x-jet-input-error for="name" />
        </div>

        {{-- slug --}}
        <div class="mb-4">
            <x-jet-label value="Slug" />
            <x-jet-input type="text"
                disabled
                wire:model="slug"
                class="w-full bg-gray-200" 
                placeholder="Slug business" />

            <x-jet-input-error for="slug" />
        </div>  

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

    {{-- phone number -- mail --}}


    <div class="bg-white rounded-lg shadow-lg  grid grid-cols-2 gap-6 p-4 mb-4 h-28">

        {{-- phone_number --}}
       <div class="mb-4">
           <x-jet-label value="Phone number" />
           <x-jet-input type="number" 
                       class="w-full"
                       wire:model="phone_number"
                       placeholder="Enter phone number" />
           <x-jet-input-error for="phone_number" />
       </div>

        {{-- mail --}}
        {{-- <div class="mb-4">
            <x-jet-label value="Mail" />
            <x-jet-input type="email" 
                        class="w-full"
                        wire:model="mail"
                        placeholder="Enter mail" />
            <x-jet-input-error for="mail" />
        </div>  --}}  

        <div class="mb-4">
            <x-jet-label for="mail" value="{{ __('Mail') }}" />
            <x-jet-input id="mail" class="w-full" type="email" name="mail" :value="old('mail')" required  wire:model="mail" placeholder="Enter business mail"/>
            <x-jet-input-error for="mail" />
        </div>
    </div>

    {{-- business type && filling_number --}}

    <div class="flex justify-center items-center bg-white rounded-lg shadow-lg gap-6 p-4 mb-4 h-28">
        
        {{-- filling number --}}       
        <div class="flex-1">
           <x-jet-label value="Filling Number" />
           <select class="w-full form-control" wire:model="filling_number_id">
               <option value="" selected disabled>Select a filling number</option>

               @foreach ($filling_numbers as $filling_number)
                   <option value="{{$filling_number->id}}">{{$filling_number->number}}</option>
               @endforeach
           </select>

           <x-jet-input-error for="filling_number_id" />
       </div>

       {{-- business id --}}
       <div class="flex-1">
           <x-jet-label value="Business Type" />
           <x-jet-input type="number" 
                       class="w-full"
                       wire:model="business_type"
                       placeholder="Enter business type" />
           <x-jet-input-error for="business_type" />
       </div>

    </div>

    {{-- categories - subcategories --}}

    <div class="bg-white rounded-lg shadow-lg  grid grid-cols-2 gap-6 p-4 mb-4 h-28">
        {{-- Categoría --}}
        <div>
            <x-jet-label value="Categories" />
            <select class="w-full form-control" wire:model="category_id">
                <option value="" selected disabled>Select a category</option>

                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="category_id" />
        </div>

        {{-- Subcategoría --}}
        <div>
            <x-jet-label value="Subcategories" />
            <select class="w-full form-control" wire:model="subcategory_id">
                <option value="" selected disabled>Select a subcategory</option>

                @foreach ($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="subcategory_id" />
        </div>
    </div>

    {{-- description --}}
    <div class="mb-4">
        <div wire:ignore>
            <x-jet-label value="Description" />
            <textarea class="w-full form-control" rows="4"
                wire:model="description"
                x-data 
                x-init="ClassicEditor.create($refs.miEditor)
                .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData())
                    })
                })
                .catch( error => {
                    console.error( error );
                } );"
                x-ref="miEditor">
            </textarea>
        </div>
        <x-jet-input-error for="description" />
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
                        wire:model="zip_code"
                        placeholder="Enter zip code" />
            <x-jet-input-error for="zip_code" />
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

    <div class="flex mt-4">
        <x-jet-button
            wire:loading.attr="disabled"
            wire:target="save"
            wire:click="save"
            class="ml-auto">
            Create product
        </x-jet-button>
    </div>

</div>