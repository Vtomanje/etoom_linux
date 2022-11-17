<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'etoom') }}</title>

      <!-- Fonts -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

      {{-- flowbite --}}
     <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />

      <!-- Styles -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])       

      {{-- Fontawesome --}}
      <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

      {{-- Glider --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" />

      {{-- FlexSlider --}}
      <link rel="stylesheet" href="{{ asset('vendor/FlexSlider/flexslider.css') }}">     

      @livewireStyles
    
      {{-- Glider --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js" integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA==" crossorigin="anonymous"></script>

      {{-- jquery --}}
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      {{-- FlexSlider --}}
      <script src="{{ asset('vendor/FlexSlider/jquery.flexslider-min.js') }}"></script>    

    </head>
    <body class="font-sans antialiased container mx-auto">
        <x-jet-banner />

        <div class="min-h-screen bg-white">
            @livewire('navigation')

            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            {{-- footer --}}
            <x-footer/>
        </div>

        @stack('modals')

        @livewireScripts       

        {{-- stripe --}}

        <script src="https://js.stripe.com/v3/"></script>

        <!--Scrip para ventana de nav -->
        <script>
            function dropDown(){
                return {
                    /* cualquier cosa cambiar el (open:false por open:true)para que este visible u oculto */
                    open: false,
                    show(){
                        if(this.open){
                            this.open = false
                            document.getElement.style.overflow = 'auto'
                        
                        }else{
                            this.open = true;
                            document.getElement.style.overflow = 'hidden'
                        }
                    },
                    close(){
                        this.open = false;
                        document.getElement.style.overflow = 'auto' 
                    }
                }
            }
        </script>

        @stack('script')
        
    </body>
</html>
