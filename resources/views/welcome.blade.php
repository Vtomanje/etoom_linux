<x-app-layout> 
    
    <div>
        {{-- modal --}}

        @livewire('modal')

        <div>
            @livewire('public-slider')
        </div>

        <div class="container py-8">
            <section class="mb-6">
                <div class="flex items-center mb-2">
                    <h1 class="text-lg uppercase font-semibold  text-gray-700">categories</h1>
                </div>        
                
                @livewire('categories-slider', ['categories' => $categories])              
            </section>            
        </div>
    </div>

    @push('script')
        <script>
            new Glider(document.querySelector('.glider'), {
                slidesToShow: 1,
                slidesToScroll: 1,
                draggable: true,
                dots: '.dots',
                arrows: {
                 prev: '.glider-prev',
                 next: '.glider-next'
                },
                responsive: [
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 3.5,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 4.5,
                            slidesToScroll: 4,
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 5.5,
                            slidesToScroll: 5,
                        }
                    },
                    {
                        breakpoint: 1280,
                        settings: {
                            slidesToShow: 5.5,
                            slidesToScroll: 2,
                        }
                    },
                ]
            });
        </script>
    @endpush

</x-app-layout>