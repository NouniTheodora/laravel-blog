<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/articles', function () {
    return view('articles', [
        'articles' => Article::latest()->with('category', 'author')->get()
    ]);
});

Route::get('/articles/{article:slug}', function (Article $article) { // Post::where('slug',  $post)->firstOrFail();
    return view('article', [
        'article'   => $article
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('articles', [
        'articles'  => $category->posts
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('articles', [
        'articles' => $author->articles
    ]);
});