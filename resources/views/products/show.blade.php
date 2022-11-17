<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images->take(8) as $image)
                            <li data-thumb=" {{ Storage::url($image->url) }}">
                                <img src=" {{ Storage::url($image->url) }}" />
                            </li>                        
                        @endforeach                        
                    </ul>
                </div>
            </div>

            <div>
                @if ($product->status == 1)
                   <p class="text-red-300">Anuncio en borrador</p>
                @endif
                <h1 class="text-2xl font-bold text-trueGray-700 capitalize text-center">{{$product->name}}</h1>
    
                {{-- phone number - mail --}}  
                <div class="bg-gray-100 rounded-lg shadow-lg mt-6">
                    {{-- phone number - mail --}}
                    <div class="flex justify-around">

                        <div class="p-4 text-gray-700">
                            <h2 class="mb-4 font-bold text-lg">Phone Number</h2>
                                {!!$product->phone_number!!}
                        </div>

                        <div class="p-4 text-gray-700">
                            <h2 class="mb-4 font-bold text-lg">Mail</h2>
                                {!!$product->mail!!}
                        </div>                                     
                    </div>

                    <div class="divide-x-4 h-1 bg-gray-50"></div>

                    {{-- filling number --}}
                    <div class="flex justify-around">            
                        <div class="p-4 text-gray-700">
                            <h2 class="mb-4 font-bold text-lg">Filling Number</h2>
                                {!!$product->filling_number->number!!}
                        </div>

                        <div class="p-4 text-gray-700">
                            <h2 class="mb-4 font-bold text-lg">Business Type</h2>
                                {!!$product->business_type !!}
                        </div>                               
                    </div>                  
                </div>


                {{-- description --}}

                <div class="bg-gray-100 rounded-lg shadow-lg mt-6">
                    
                    <div class="p-4 text-gray-700">
                        <h2 class="mb-4 font-bold text-lg text-center">Description</h2>
                        {!!$product->description!!}
                    </div>
                </div>   

                {{-- state city county --}}

                 <div class="bg-gray-100 rounded-lg shadow-lg mt-6">
                    {{-- phone number - mail --}}
                    <div class="flex justify-around">

                        <div class="p-4 text-gray-700">
                            <h2 class="mb-4 font-bold text-lg">State</h2>
                                {!!$product->department->name!!}
                        </div>

                        <div class="p-4 text-gray-700">
                            <h2 class="mb-4 font-bold text-lg">City</h2>
                                {!!$product->city->name!!}
                        </div>     
                        
                        <div class="p-4 text-gray-700">
                            <h2 class="mb-4 font-bold text-lg">Zip code</h2>
                                {!!$product->zip_code!!}
                        </div>  
                    </div>                             
                </div>      
                
                @if ($product->facebook || $product->twitter || $product->instagram)
                                    
                <div class="p-4 text-gray-700">
                    <h2 class="mb-4 font-bold text-lg text-center">Social Networks</h2>
                    
                    {{-- redes sociales --}}

                    <div class="flex gap-4 justify-center items-center">
                        @if ($product->facebook)
                            
                            <div class="text-trueGray-700">
                                <span class="text-blue-600">
                                    <a href="{{ 'https://www.facebook.com/'.$product->facebook }}" target="_blank">
                                        <i class="fab fa-facebook text-2xl"></i>
                                    </a>
                                </span>
                            </div>

                        @endif

                        @if($product->instagram)                         

                            <div class="text-trueGray-700">
                                <span class="text-pink-600">
                                    <a href="{{ 'https://www.instagram.com/'.$product->instagram }}" target="_blank">
                                    <i class="fab fa-instagram text-2xl"></i>
                                    </a>                                
                                </span>
                            </div>

                        @endif
                        

                        @if($product->twitter)                        

                            <div class="text-trueGray-700">
                                <span class="text-cyan-600">
                                    <a href="{{ 'https://twitter.com/'.$product->twitter }}" target="_blank">
                                        <i class="fab fa-twitter text-2xl"></i>
                                    </a>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

                @endif

            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
