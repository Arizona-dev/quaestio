<x-app-layout>
    <x-slot name="header">

        <div class="flex flex-row justify-between col-lg-12 margin-tb">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Quaestio • Gestion des topics') }}
            </h2>
            @yield('header')
        </div>
    </x-slot>
    <div class="flex flex-wrap">
        @yield('content')
    </div>

</x-app-layout>