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
                    <h1 class="text-4xl mb-3">Hot Topics</h1>
                    <div class="posts flex flex-col">
                        @foreach ($articles as $article)
                        <div class="post flex flex-col justify-between p-4 text-justify">
                            <a href="{{ route('articles.show', $article->id) }}">
                                <h2 class="self-left mb-3">
                                    <b>{{ ucfirst($article->topic) }}</b>
                                </h2>
                                @php $str = preg_replace( "/\n\s+/", "\n", rtrim(html_entity_decode(str_replace("&nbsp;", '', strip_tags($article->description)))) ) @endphp
                                <div class="mb-2">@truncate($str, 150)</div>
                            </a>
                            <div class="flex flex-row justify-between">
                                <small class="self-end mb-3"><b>De</b> : <i>{{ $article->user->name }}</i></small>
                                <small class="self-end mb-3"><b>Tags</b> : <i>{{ $article->tags }}</i></small>
                            </div>
                            <hr>
                        </div>
                        @endforeach
                    </div>{{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>