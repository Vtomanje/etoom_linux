<div>
    @php
    use App\Models\User;

    $user = new User();
  @endphp

  @if ($mergePremium->count())
    @if (!$mergePremium->count() <= 1)    

    <div id="default-carousel" class="relative" data-carousel="slide">
      <!-- Carousel wrapper -->
      <div class="relative h-56 overflow-hidden md:h-96">
        @foreach ($mergePremium->shuffle() as $mP)   
            @if ($user::where('id',$mP->user_id)->get()->first()->subscribed('Prueba premium') 
            || $user::where('id',$mP->user_id)->get()->first()->hasRole('admin'))
                <!-- Item  -->
                <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20" data-carousel-item="">    
                    <a 
                    class="cursor-pointer"
                    @if ($mP->route == '')
                        wire:click="emptySlide"
                    @else
                      href="{{ $mP->route }}"
                    @endif
                    >                    
                      <img src="{{ Storage::url($mP->url) }}" class="absolute block w-full h-full">
                    </a>     
                </div>     
            @endif

        @endforeach
      </div>
    </div>

    @endif      
  @endif 
</div>