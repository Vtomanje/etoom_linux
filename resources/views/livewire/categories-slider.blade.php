<div>
    @if (count($categories))
        <div class="glider-contain">
            <ul class="glider">            
                @foreach ($categories as $category)
                    <li class="bg-white rounded-lg shadow {{ $loop->last ? '' : 'sm: mr-4' }} overflow-hidden">
                        <article>
                            <figure>
                                <img class="h-48 w-full {{-- object-cover --}} object-center" src="{{Storage::url($category->image) }}">
                            </figure>
                            <div class="py-4 px-2">
                                <h1 class="text-sm font-semibold">
                                    <a href="{{ route('categories.show', $category )}}">
                                        {{$category->name}}
                                    </a>
                                </h1>
                            </div>
                        
                        </article>
                    </li>                    
                @endforeach
            </ul>                  
            <div role="tablist" class="dots" style="padding-top:30px"></div>           
        </div>

    @else 
        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
            <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
        </div>	
    @endif
</div>    


