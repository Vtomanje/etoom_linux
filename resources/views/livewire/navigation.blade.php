<header class="bg-sky-500 shadow-lg sticky top-0" x-data="dropDown()" style="z-index: 900">
    {{-- logo-categories-search-user-cart --}}
    <div class="container flex items-center h-24 justify-between md:justify-start">        
        {{-- logo --}}
        <a href="/">
            <x-logo/>
        </a>  

        {{-- categorias --}}
        <a class="flex border p-2 shadow hover:bg-lime-400 transition duration-300 ease-in-out rounded-md mx-2 cursor-pointer" 
        x-on:click="show()"
        class="flex flex-col items-center justify-center order-last md:order-first px-6 md:px-4 bg-lime-400 bg-opacity-25 text-white cursor-pointer ">
        
            <svg class="h-6 mr-3 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />               
            </svg>
            <span class="text-sm text-white font-semibold hidden md:block">Categories</span>
        </a>
        
        {{-- search --}}
        <div class="flex-1 hidden md:block">
            @livewire('search')  
        </div>

        <!-- Settings Dropdown -->
        <div class="ml-4 mr-3 relative hidden md:block">
            @auth
            {{-- Mostramos el dropdown si hemos iniciado sesion --}}
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">                   
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button> 
                            

                                              
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>  
                       {{--  @can('admin.posts.index')
                        <x-jet-dropdown-link href="{{ route('admin.index') }}">
                            Administrator
                        </x-jet-dropdown-link>
                        @endcan --}}
                        <x-jet-dropdown-link href="{{ route('admin.posts.index') }}">
                            My Office
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
                @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-black text-4xl cursor-pointer"></i>
                    </x-slot>
                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>  
                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            @endauth
        </div> 
       {{-- <a href="{{ route('login') }}" class="text-sm text-white font-semibold hidden md:block">Login</a>    --}}
               
    </div>

  {{-- navigation menu--}}
  <nav id="navigation-menu" class="bg-trueGray-700 bg-opacity-25 absolute w-full hidden" x-show="open" :class="{'block':open,'hidden':!open}">
    {{-- desktop menu --}}
    <div class="container {{-- h-80 esta clase causa problema --}} hidden md:block">
        <div class="grid grid-cols-4 h-full relative" x-on:click.away="close()">
            <ul class="bg-white">
                {{-- categories --}}    
                @if ($categories->count() >= 1)                                        
                    @foreach ($categories->take(7) as $category)
                        <li class="navigation-link text-trueGray-500 hover:bg-sky-600 hover:text-white">
                            <a href="{{ route('categories.show', $category )}}" class="py-2 px-4 text-sm flex items-center">
                                {{-- category icon --}}
                                
                                {{$category->name}}
                            </a>
                            
                            {{-- navigation-submenu --}}
                            <div class="navigation-submenu absolute w-3/4 h-full bg-gray-100 top-0 right-0 hidden">
                                {{-- subcategories hover --}}
                                <x-navigation-subcategories :category="$category"/>                                
                            </div>
                        </li>                                                           
                    @endforeach    
                    
                    
                    @if ($categories->count() > 7)
                        <li class="navigation-link bg-sky-500 text-trueGray-500 hover:bg-sky-300 hover:text-white">
                            <a href="{{ route('categories') }}" class="py-2 px-4 text-sm flex items-center">
                                                            
                               <span class="font-semi-bold text-md">
                                    Show All Categories
                               </span>
                            </a>                     
                        </li>        
                    @endif
                @endif     

            </ul>
            @if ($categories->count() >= 1)
                
                {{-- subcategories --}}
                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()"/>
                </div>
            @endif

        </div>
    </div>

     {{-- mobile menu --}}
     <div class="bg-white h-full overflow-y-auto md:hidden">
        {{-- mobile search --}}
        <div class="container my-4">
            @livewire('search')
        </div>
        <ul>
            @if ($categories)
                
                @foreach ($categories as $category)
                    <li class="text-trueGray-500 hover:bg-black hover:text-white">
                        <a href="{{ route('categories.show', $category )}}" class="py-2 px-4 text-sm flex items-center">
                            {{-- category icon
                            <span class="flex justify-center w-9">{!!$category->icon!!}</span> --}}
                            {{$category->name}}
                        </a>                                            
                    </li>      
                @endforeach

            @endif

        </ul>
         {{-- login and register --}}
        <p class="text-black bg-lime-400 px-6 py-2">Users</p>

         {{-- mobile cart shop 
         @livewire('cart-mobil')--}}

        {{--  @can('admin.index')
         <x-jet-dropdown-link href="{{ route('admin.index') }}">
             Administrator
         </x-jet-dropdown-link>
         @endcan --}}
         <x-jet-dropdown-link href="{{ route('admin.posts.index') }}">
             My Office
         </x-jet-dropdown-link>


        @auth
            <a href="{{ route('profile.show') }}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-black hover:text-white">
                {{-- profile icon --}}
                <span class="flex justify-center w-9">
                    <i class="fas fa-address-card"></i>
                </span>
               Perfil
            </a>  
            <a href="" 
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-black hover:text-white">
                {{-- profile icon --}}
                <span class="flex justify-center w-9">
                    <i class="fas fa-sign-out-alt"></i>
                </span>
              Logout
            </a>   
            
            <form id="logout-form" action="{{route('logout')}}" method="POST" class="hidden">
                @csrf
            </form>

            @else

            <a href="{{ route('login') }}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-black hover:text-white">
                {{-- profile icon --}}
                <span class="flex justify-center w-9">
                    <i class="fas fa-user-circle"></i>
                </span>
               Login
            </a>  

            <a href="{{ route('register') }}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-black hover:text-white">
                {{-- profile icon --}}
                <span class="flex justify-center w-9">
                    <i class="fas fa-fingerprint"></i>
                </span>
               Register
            </a>  
        @endauth

    </div>  
</nav>
</header>
