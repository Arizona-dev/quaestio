<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(5);

        // return view('articles.index', ['articles' => $articles]);
        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required|max:255',
            'description' => 'required|max:10000',
            'tags' => 'required|max:255'
        ]);

        Article::create([
            'topic' => request('topic'),
            'description' => html_entity_decode(request('description')),
            'tags' => request('tags'),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('articles.index')
        ->with('success', 'Votre topic à bien été créé.');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'topic' => 'required|max:255',
            'description' => 'required|max:10000',
            'tags' => 'required|max:255',
        ]);

        $article->update($request->all());
  
        return redirect()->route('articles.index')->with('success', 'Votre topic à bien été mis à jour');
    }

    public function destroy(Article $article)
    {
        $article->delete();
  
        return redirect()->route('articles.index')->with('success', 'Votre topic à bien été supprimé');
    }

    public function myTopics() {

        $articles = Article::where(['user_id' => Auth::user()->id])->paginate(5);

        return view('articles.index', ['articles' => $articles]);
    }

}