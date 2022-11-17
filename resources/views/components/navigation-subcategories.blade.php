@props(['category'])

<div class="grid grid-cols-4 p-4">

    <div class="cols-apn-1">
        <p class="text-lg text-gray-600 font-semibold text-center mb-3">Subcategories</p>
        <ul>
            @foreach ($category->subcategories->take(7) as $subcategory)
                <li>
                    <a href="{{route('categories.show', $category)}}" class="text-sm text-gray-500 font-semibold text-center py-1 px-4 hover:text-indigo-700">
                        {{$subcategory->name}}
                    </a>
                </li>

                @if ($loop->iteration > 6)
                    <li class="bg-sky-500">
                        <a href="{{route('categories.show', $category)}}" class="text-sm text-white font-semibold text-center py-1 px-4 hover:text-indigo-700">
                            Show All Subcategories
                        </a>
                    </li>                    
                @endif
            @endforeach

           
        </ul>
    </div>

    <div class="col-span-3">        
        <img class="h-64 w-full object-cover object-center" src="{{Storage::url($category->image)}}" >
    </div>
</div>