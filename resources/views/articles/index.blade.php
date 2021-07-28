@extends('articles.layout')
@section('header')
<a class="px-4 py-1 text-sm text-green-600 font-semibold rounded-full border border-green-200 hover:text-white hover:bg-green-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2" href="{{ route('articles.create') }}">Créer un topic</a>
@endsection
@section('content')

<div class="max-w-8xl mx-auto sm:px-6 lg:px-8 mt-12">
  @if ($message = Session::get('success'))
  <div class="alert alert-success mb-8">
    <p>{{ $message }}</p>
  </div>
  @endif
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
    <div class="p-6 bg-white border-b border-gray-400">
      <table>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Topic</th>
            <th scope="col">Description</th>
            <th scope="col">Tags</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($articles as $article)
          <tr>
            <td scope="row">{{ $article->id }}</th>
            <td>{{ $article->topic }}</td>
            <td>{{ str_replace("&nbsp;", '', strip_tags(html_entity_decode($article->description))) }}</td>
            <td>{{ $article->tags }}</td>
            <td>
              <form action="{{ route('articles.destroy',$article->id) }}" method="POST">
                <div class="flex flex-col">
                  <a class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2" href="{{ route('articles.show',$article->id) }}">Voir</a>
                  <a class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2 mt-2" href="{{ route('articles.edit',$article->id) }}">Editer</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="px-4 py-1 text-sm text-red-600 font-semibold rounded-full border border-red-200 hover:text-white hover:bg-red-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 mt-2 center">Supprimer</button>
                </div>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  {{ $articles->links() }}
</div>
@endsection