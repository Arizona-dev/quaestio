<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/articles', ArticleController::class);

Route::get('/my-topics', [ArticleController::class, 'myTopics'])
->middleware(['auth'])->name('my-topics');

Route::get('/', function () { return view('welcome'); })->name('home');

Route::get('/', function () {
    $articles = Article::paginate(5);
    return view('home', ['articles' => $articles]);
})->name('home');

Route::get('/dashboard', function () {
    $articles = Article::paginate(5);
    return view('dashboard', ['articles' => $articles]);
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/{page}', function ($page) {
    // $articles = Article::paginate(3);
    $items = ($page == 'articles') ? Article::paginate(5) : Article::paginate(1);
    return view('dashboard', ['articles' => $items]);
})->middleware(['auth']);

require __DIR__.'/auth.php';