<x-app-layout>
    <div>
        <div class="max-w-5xl mx-auto p-4 sm:px-6 lg:px-8 my-10 bg-gray-100 shadow-lg rounded-md">
            <div class="grid grid-cols-3 gap-3">
                @if ($categories->count() >= 1)
                    
                @foreach ($categories as $category)
                    <div class="col-span-1">
                        <x-card-image :data="$category" route="categories.show"/>
                    </div>
                @endforeach        
                
                @endif

            </div>
            
            @if ($categories->count() < 1)
            
            <div>
                <div class="mx-auto">
                  <h3 class="text-2xl text-center text-red-400 font-semibold">
                      There are no categories
                  </h3>
                </div>
            </div>

            @endif
            
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>