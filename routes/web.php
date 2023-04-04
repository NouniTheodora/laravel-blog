<?php

use App\Models\Article;
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
        'articles' => Article::fetchAllArticles()
    ]);
});

// Whatever is passed in the url - the same value is passed as a parameter in the function as well
Route::get('/articles/{article_slug}', function ($article_slug) {
    return view('article', [
        'article'   => Article::findArticleBySlug($article_slug)
    ]);
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});