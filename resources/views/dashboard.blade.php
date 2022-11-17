<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>    

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 my-4 shadow-xl py-3">
        <div class="flex items-center ">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            Welcome to office
            </h2>

            @if (auth()->user()->hasRole('admin'))
            <x-button-enlace class="ml-auto" href="{{route('admin.index')}}">
                Go my office
            </x-button-enlace>

            @else

            <x-button-enlace class="ml-auto" href="{{route('admin.posts.index')}}">
                Go my office
            </x-button-enlace>                   
            @endif

        </div>
    </div>
   

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">      
                         
             <x-dashboard-component/>
            </div>
        </div>
    </div>
</x-app-layout>
