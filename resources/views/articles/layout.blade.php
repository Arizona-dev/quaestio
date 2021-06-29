<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quaestio • Gestion des topics') }}
        </h2>
    </x-slot>
    <div class="flex flex-wrap">
      @yield('content')
    </div>
    
</x-app-layout>