<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Topics') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-4xl mb-3">Liste des Topics</h1>
                    <ul>
                        @foreach ( $articles as $article)
                            <li class="mb-3 border p-4">
                                <h2 class="text-2xl">{{$article->topic}}</h2>
                                <p>{{$article->description}}</p>
                            </li>
                        @endforeach
                    </ul>
                    <br>
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>